
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

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
            .dropdown-menu {
                margin: 0px;
                padding: 0;
            }
            .row {
                border: 10px solid #80C2B6;
                margin: auto;
                margin-top: auto;
                max-width: auto;
                border-radius: 10px;
                border-top-width: 60px;
                border-bottom-width: 10px;
                padding: 10px;
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
          <div class="results">
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
            </div>

<form action="{{ route('goats.multiBreedUpdate') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <div class="table-wrapper">
            <div class="row">
                <div class="col">
                    <h4>?????????????????????????????????????????????????????????????????????????????????????????????</h4>
                </div>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>???????????? / ???????????????????????????????????????</th>
                                <th>???????????????????????????????????????????????????</th>
                                <th>?????????/???????????????/??????</th>
                                <th>???????????? / ???????????????????????????????????????</th>
                                <th>?????????????????????????????????</th>
                                <th><a href="javascritp:;" class="btn btn-success addRow">+</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="goat_id[]" class="form-control" id="goat_id" required oninvalid="this.setCustomValidity('?????????????????????????????????????????????')" oninput="this.setCustomValidity('')">
                                        <option value="">--???????????????--</option>
                                        @foreach($goatF AS $goat)
                                        <option value="{{ $goat->goatId }}" {{ (collect(old('goat_id'))->contains($goat->goatId)) ? 'selected':'' }}>{{ $goat->goatName }} / {{ $goat->goatId }}</option>
                                        @endforeach
                                    </select>
                                    @error('goat_id.*')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="breedNo[]" class="form-control" placeholder="???????????????????????????????????????????????????" value="{{ (old('breedNo.*')) }}" min="1" required oninvalid="this.setCustomValidity('?????????????????????????????????????????????')" oninput="this.setCustomValidity('')">
                                    @error('breedNo.*')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" name="dateOfBreed[]" class="form-control" value="{{ (old('dateOfBreed.*')) }}" required oninvalid="this.setCustomValidity('?????????????????????????????????????????????')" oninput="this.setCustomValidity('')">
                                    @error('dateOfBreed.*')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>                                    
                                    <select name="father_breeder[]" class="form-control" id="father_breeder" required oninvalid="this.setCustomValidity('?????????????????????????????????????????????')" oninput="this.setCustomValidity('')">
                                        <option value="">--???????????????--</option>
                                        @foreach($goatM AS $goat)
                                        <option value="{{ $goat->goatId }}" {{ (collect(old('father_breeder'))->contains($goat->goatId)) ? 'selected':'' }}>{{ $goat->goatName }} / {{ $goat->goatId }}</option>
                                        @endforeach
                                    </select>
                                    @error('father_breeder.*')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                <input type="text" name="breed_staff[]" class="form-control" placeholder="?????????????????????????????????????????????????????????" value="{{ (old('breed_staff.*')) }}" required oninvalid="this.setCustomValidity('?????????????????????????????????????????????')" oninput="this.setCustomValidity('')">
                                    @error('breed_staff.*')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td><a href="javascritp:;" class="btn btn-danger deleteRow">-</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="submit">
                    <button type="submit" class="btn " style="background-color: #80C2B6;">??????????????????</button>
                    <a href="{{ route('goats.updateMultipleHome') }}" class="btn btn-secondary " role="button" aria-disabled="true">????????????????????????</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('thead').on('click', '.addRow', function(){
                var tr = '<tr>'+
                '<td>'+
                    '<select name="goat_id[]" class="form-control" id="goat_id" required oninvalid="this.setCustomValidity("?????????????????????????????????????????????")" oninput="this.setCustomValidity("")" >'+
                        '<option value="">--???????????????--</option>'+
                        '@foreach($goatF AS $goat)'+
                        '<option value="{{ $goat->goatId }}" {{ (collect(old("goat_id"))->contains($goat->goatId)) ? "selected":"" }}>{{ $goat->goatName }} / {{ $goat->goatId }}</option>'+
                        '@endforeach'+
                    '</select>'+
                    '@error("goat_id.*")'+
                        '<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>'+
                    '@enderror'+
                '</td>'+
                '<td>'+
                    '<input type="number" name="breedNo[]" class="form-control" placeholder="???????????????????????????????????????????????????" value="{{ (old("breedNo.*")) }}" min="1" required oninvalid="this.setCustomValidity("?????????????????????????????????????????????")" oninput="this.setCustomValidity("")">'+
                    '@error("breedNo.*")'+
                        '<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>'+
                    '@enderror'+
                '</td>'+
                '<td>'+
                    '<input type="date" name="dateOfBreed[]" class="form-control" value="{{ (old("dateOfBreed.*")) }}" required oninvalid="this.setCustomValidity("?????????????????????????????????????????????")" oninput="this.setCustomValidity("")">'+
                    '@error("dateOfBreed.*")'+
                        '<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>'+
                    '@enderror'+
                '</td>'+
                '<td>'+
                    '<select name="father_breeder[]" class="form-control" id="father_breeder" required oninvalid="this.setCustomValidity("?????????????????????????????????????????????")" oninput="this.setCustomValidity("")">'+
                        '<option value="">--???????????????--</option>'+
                        '@foreach($goatM AS $goat)'+
                        '<option value="{{ $goat->goatId }}" {{ (collect(old("father_breeder"))->contains($goat->goatId)) ? "selected":"" }}>{{ $goat->goatName }} / {{ $goat->goatId }}</option>'+
                        '@endforeach'+
                    '</select>'+
                    '@error("father_breeder.*")'+
                        '<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>'+
                    '@enderror'+
                '</td>'+
                '<td>'+
                    '<input type="text" name="breed_staff[]" class="form-control" placeholder="?????????????????????????????????????????????????????????" value="{{ (old("breed_staff.*")) }}" required oninvalid="this.setCustomValidity("?????????????????????????????????????????????")" oninput="this.setCustomValidity("")">'+
                    '@error("breed_staff.*")'+
                        '<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>'+
                    '@enderror'+
                '</td>'+
                '<td><a href="javascritp:;" class="btn btn-danger deleteRow">-</a></td>'+
              '</tr>';

              $('tbody').append(tr);
            });
            $('tbody').on('click', '.deleteRow', function(){
                $(this).parent().parent().remove();
            });
    </script>
</form>

</body>
</html>@endsection
