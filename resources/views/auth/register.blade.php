


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container-fluid h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-10">
            <h1 class="title">PROXY SHOP</h1>
            <div class="card">
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">{{ __('Ime') }}</label>
                                <input id="name" required type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-6">
                                <label for="lastname" class="col-form-label">{{ __('Prezime') }}</label>
                                <input id="lastname" required type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label">{{ __('Lozinka') }}</label>
                                <input id="password" required type="password" class="form-control" name="password" required autofocus>
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="col-form-label">{{ __('Potvrdna lozinka') }}</label>
                                <input id="password_confirmation" required type="password" class="form-control" name="password_confirmation" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                <input id="email" required type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="col-md-6">
                                <label for="company" class="col-form-label">{{ __('Naziv kompanije') }}</label>
                                <input id="company" required type="text" class="form-control" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone" class="col-form-label">{{ __('Broj telefona') }}</label>
                                <input id="phone" required type="text" class="form-control @error('email') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            </div>

                            <div class="col-md-6">
                                <label for="zip" class="col-form-label">{{ __('Poštanski broj') }}</label>
                                <input id="zip" required type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="country" class="col-form-label">{{ __('Država') }}</label>
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="col-form-label">{{ __('Grad') }}</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="address" class="col-form-label">{{ __('Adresa') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="button" class="btnRegister btn-block btn btn-primary">
                                    {{ __('Registrujte se') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <a class="register_text" href="{{ route('login') }}">Imate nalog? Prijavite se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($){

        $(".btnRegister").click(function (e) {
            e.preventDefault();
            var token = $('input[name=_token]').val();
            var email = $('input[name=email]').val();
            var password = $('input[name=password]').val();
            var name = $('input[name=name]').val();
            var lastname = $('input[name=lastname]').val();
            var phone = $('input[name=phone]').val();
            var password = $('input[name=password]').val();
            var password_confirmation = $('input[name=password_confirmation]').val();
            var zip = $('input[name=zip]').val();
            var company = $('input[name=company]').val();
            var address = $('input[name=address]').val();
            var city = $('input[name=city]').val();
            var country = $('input[name=country]').val();

            var type = "POST";
            $.ajax({
                type: type,
                url: "{{ route('register') }}",
                data: {
                    _token: token,
                    email: email,
                    password: password,
                    name: name,
                    lastname: lastname,
                    phone: phone,
                    zip: zip,
                    country: country,
                    city: city,
                    address: address,
                    company: company
                },
                success: function (data) {
                    if(data.success)
                    {
                        toastr.success(data.message);
                        window.location.href = "{{URL::to('/')}}"
                    }
                    else
                        toastr.error(data.message);
                },
                error: function (data) {
                    toastr.error(data);
                }
            });
        });
    });
</script>

<style>
    body  {
        background-color: #008b8b;
    }

    .card-header, .btnRegister, .btnRegister:hover {
        color: white;
        background-color: #006868;
    }

    .card {
        border: 0px;
    }

    .register_text {
        color: #006868;
        text-align: center !important;
    }

    a {
        text-decoration: underline;
    }

    .title {
        color: white;
        text-align: center;
        padding-bottom: 30px;
    }

    .toast-title {
      font-weight: bold;
    }

    .toast-message {
      -ms-word-wrap: break-word;
      word-wrap: break-word;
    }

    .toast-message a,
    .toast-message label {
      color: #ffffff;
    }

    .toast-message a:hover {
      color: #cccccc;
      text-decoration: none;
    }

    .toast-close-button {
      position: relative;
      right: -0.3em;
      top: -0.3em;
      float: right;
      font-size: 20px;
      font-weight: bold;
      color: #ffffff;
      -webkit-text-shadow: 0 1px 0 #ffffff;
      text-shadow: 0 1px 0 #ffffff;
      opacity: 0.8;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
      filter: alpha(opacity=80);
    }

    .toast-close-button:hover,
    .toast-close-button:focus {
      color: #000000;
      text-decoration: none;
      cursor: pointer;
      opacity: 0.4;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
      filter: alpha(opacity=40);
    }

    /*Additional properties for button version
     iOS requires the button element instead of an anchor tag.
     If you want the anchor version, it requires `href="#"`.*/
    button.toast-close-button {
      padding: 0;
      cursor: pointer;
      background: transparent;
      border: 0;
      -webkit-appearance: none;
    }

    .toast-top-center {
      top: 0;
      right: 0;
      width: 100%;
    }

    .toast-bottom-center {
      bottom: 0;
      right: 0;
      width: 100%;
    }

    .toast-top-full-width {
      top: 0;
      right: 0;
      width: 100%;
    }

    .toast-bottom-full-width {
      bottom: 0;
      right: 0;
      width: 100%;
    }

    .toast-top-left {
      top: 12px;
      left: 12px;
    }

    .toast-top-right {
      top: 12px;
      right: 12px;
    }

    .toast-bottom-right {
      right: 12px;
      bottom: 12px;
    }

    .toast-bottom-left {
      bottom: 12px;
      left: 12px;
    }

    #toast-container {
      position: fixed;
      z-index: 999999;
      /*overrides*/
    }

    #toast-container * {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    #toast-container > div {
      position: relative;
      overflow: hidden;
      margin: 0 0 6px;
      padding: 15px 15px 15px 50px;
      width: 300px;
      -moz-border-radius: 3px 3px 3px 3px;
      -webkit-border-radius: 3px 3px 3px 3px;
      border-radius: 3px 3px 3px 3px;
      background-position: 15px center;
      background-repeat: no-repeat;
      -moz-box-shadow: 0 0 12px #999999;
      -webkit-box-shadow: 0 0 12px #999999;
      box-shadow: 0 0 12px #999999;
      color: #ffffff;
      opacity: 1;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
      filter: alpha(opacity=80);
    }

    #toast-container > :hover {
      opacity: 1;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
      filter: alpha(opacity=100);
      cursor: pointer;
    }

    #toast-container > .toast-info {
      background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=") !important;
    }

    #toast-container > .toast-error {
      background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=") !important;
    }

    #toast-container > .toast-success {
      background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==") !important;
    }

    #toast-container > .toast-warning {
      background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=") !important;
    }

    #toast-container > .toast-classic {
      background-image: url("http://png-2.findicons.com/files/icons/2252/iphone_toolbar_icons/30/icon_bell.png") !important;
    }

    #toast-container.toast-top-center > div,
    #toast-container.toast-bottom-center > div {
      width: 300px;
      margin: auto;
    }

    #toast-container.toast-top-full-width > div,
    #toast-container.toast-bottom-full-width > div {
      width: 96%;
      margin: auto;
    }

    .toast {
      background-color: #030303;
    }

    .toast-success {
      background-color: #51a351;
    }

    .toast-error {
      background-color: #bd362f;
    }

    .toast-info {
      background-color: #2f96b4;
    }

    .toast-warning {
      background-color: #f89406;
    }

    .toast-classic {
      background-color: grey;
    }

    .toast-progress {
      position: absolute;
      left: 0;
      bottom: 0;
      height: 4px;
      background-color: #000000;
      opacity: 0.4;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
      filter: alpha(opacity=40);
    }

    /*Responsive Design*/
    @media all and (max-width: 240px) {
      #toast-container > div {
        padding: 8px 8px 8px 50px;
        width: 11em;
      }

      #toast-container .toast-close-button {
        right: -0.2em;
        top: -0.2em;
      }
    }
    @media all and (min-width: 241px) and (max-width: 480px) {
      #toast-container > div {
        padding: 8px 8px 8px 50px;
        width: 18em;
      }

      #toast-container .toast-close-button {
        right: -0.2em;
        top: -0.2em;
      }
    }
    @media all and (min-width: 481px) and (max-width: 768px) {
      #toast-container > div {
        padding: 15px 15px 15px 50px;
        width: 25em;
      }
    }
    </style>
