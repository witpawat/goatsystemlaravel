@extends('layouts.app')

@section('content')

   <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <script src="https://unpkg.com/feather-icons"></script>
        <script src="js/bootstrap.js"></script>
        <script src="path/to/dist/feather.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://getbootstrap.com/docs/5.0/examples/carousel/carousel.css" rel="stylesheet">
        <link rel="stylesheet" href="resources/css/style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

            .row {
                border: 10px solid #80C2B6;
                margin: auto;
                margin-top: auto;
                max-width: 900px;
                border-radius: 10px;
                border-top-width: 60px;
                border-bottom-width: 10px;
                padding: 10px;
            }
            .grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                column-gap: 15px;
                row-gap: 5px;
            }
            h4 {
                text-align: center;
            }
            .submit {
                text-align: center;
            }
    </style>
</head>
    <body>
            <main>

        <div class="container">


            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('goats.update', $goat->goatId) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row ">
                    <div class="col-md-auto"></div>
                    <div class="col-md-auto">
                        <h4>Goat</h4>

                        <h5>?????????????????????????????????????????????????????????????????????</h5>
                        <div class="grid">
                            <div class="mb-2">
                                <label for="fatherId">??????????????????????????????????????????????????? :</label>
                            <input type="text" name="fatherId" value="{{ $goat->fatherId }}" class="form-control" placeholder="???????????????????????????????????????????????????"
                                placeholder="Father Goat ID">
                            @error('fatherId')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="fatherGoatName">??????????????????????????????????????????????????? :</label>
                            <input type="text" name="fatherGoatName" value="{{ $goat->fatherGoatName }}" placeholder="???????????????????????????????????????????????????"
                                class="form-control" placeholder="Father Goat Name">
                            @error('fatherGoatName')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="fatherGene">?????????????????? :</label>
                            <br><select class="form-control" id="fatherGene" name="fatherGene">
                                    @foreach($gene AS $geneF)
                                        <option value="{{ $geneF->gene_name }}" {{ (old('fatherGene', $goat->fatherGene) == $geneF->gene_name) ? 'selected':'' }}>{{ $geneF->gene_name }}</option>
                                    @endforeach
                            </select>
                            @error('fatherGene')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="motherId">?????????????????????????????????????????????????????? :</label>
                            <input type="text" name="motherId" value="{{ $goat->motherId }}" class="form-control" placeholder="??????????????????????????????????????????????????????"
                                placeholder="Mother Goat ID">
                            @error('motherId')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="motherGoatName">?????????????????????????????????????????????????????? :</label>
                            <input type="text" name="motherGoatName" value="{{ $goat->motherGoatName }}" placeholder="??????????????????????????????????????????????????????"
                                class="form-control" placeholder="Mother Goat Name">
                            @error('motherGoatName')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="motherGene">?????????????????? :</label>
                        <br><select class="form-control" id="motherGene" name="motherGene">
                                @foreach($gene AS $geneM)
                                    <option value="{{ $geneM->gene_name }}" {{ (old('motherGene', $goat->motherGene) == $geneM->gene_name) ? 'selected':'' }}>{{ $geneM->gene_name }}</option>
                                @endforeach
                            </select>
                            @error('motherGene')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div> </div>
                    <h5>??????????????????????????????????????????????????????</h5>
                    <div class="grid">
                        <div class="form-group mb-2">
                            <label for="goatId">???????????????????????????????????????????????? :</label>
                            <input type="text" name="goatId" value="{{ $goat->goatId }}" class="form-control" placeholder="????????????????????????????????????????????????"
                                placeholder="Goat ID">
                            @error('goatId')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group">
                        <label for="goatName">???????????????????????? :</label>
                            <input type="text" name="goatName" value="{{ $goat->goatName }}" class="form-control" placeholder="????????????????????????"
                                placeholder="Goat Name">
                            @error('goatName')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="sex">?????????</label>
                        <br>
                            @if ($goat->sex == '??????????????????')
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male" name="sex" value="??????????????????" checked="checked">
                                    <label for="male" class="form-check-label">??????????????????</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="female" name="sex" value="?????????????????????" >
                                    <label class="form-check-label" for="female" >?????????????????????</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male" name="sex" value="??????????????????" >
                                    <label for="male" class="form-check-label">??????????????????</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="female" name="sex" value="?????????????????????" checked="checked">
                                    <label class="form-check-label" for="female" >?????????????????????</label>
                                </div>
                            @endif
                            @error('sex')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group mb-2">
                        <label for="gene">??????????????????</label>
                        <br> <select class="form-control" id="gene" name="gene">
                                @foreach($gene AS $genes)
                                    <option value="{{ $genes->gene_name }}" {{ (old('gene', $goat->gene) == $genes->gene_name) ? 'selected':'' }}>{{ $genes->gene_name }}</option>
                                @endforeach
                            </select>
                            @error('gene')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="colour">?????? :</label>
                            <input type="text" name="colour" value="{{ $goat->colour }}" class="form-control" placeholder="??????">
                            @error('colour')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dateOfBirth">?????????/???????????????/?????????????????? :</label>
                            <input type="date" name="dateOfBirth" value="{{ $goat->dateOfBirth }}"
                                class="form-control" placeholder="Date Of Birth">
                            @error('dateOfBirth')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="weightOfBirth">?????????????????????????????????????????? (???.???.) :</label>
                            <input type="text" name="weightOfBirth" value="{{ $goat->weightOfBirth }}"
                                class="form-control" placeholder="Weight Of Birth">
                            @error('weightOfBirth')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="arrivalDate">?????????/???????????????/?????? ???????????????????????? :</label>
                            <input type="date" name="arrivalDate" value="{{ $goat->arrivalDate }}"
                                class="form-control" placeholder="Arrival Date">
                            @error('arrivalDate')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="image">?????????????????? :</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url($goat->image) }}" height="200" width="200" alt="" />
                        </div>
                    </div>



                    <div class="submit">
                    <button type="submit" class="btn "style="background-color: #80C2B6;">?????????????????????????????????????????????</button>
                        <a href="{{ route('goats.index') }}" class="btn btn-secondary " enctype="multipart/form-data" role="button" aria-disabled="true">????????????????????????</a>
                    </div>
                </div>

            </form>
        </div>

    </body>

    </html>@endsection
