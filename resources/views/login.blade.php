@extends('layouts.auth')

@section('content')
    <div class="login_admin " id="dev-login">

        <div class="row">
            <div class="login100-more mask col-md-6"
                style="background-image: url('https://images.unsplash.com/photo-1587846814306-22afe89cacfe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80');">


                <p>Busco Abogado</p>
            </div>
            <div class="login100-form validate-form col-md-6">
                <!--<span class="login100-form-title p-b-43">
                    <img class="logo-admin" src="https://imgfz.com/i/0tkLDsf.png" alt="">
                </span>-->


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" v-model="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                    <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                </div>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" v-model="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                    <small v-if="errors.hasOwnProperty('password')">@{{ errors['password'][0] }}</small>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" @click="login()">
                        Entrar
                    </button>
                </div>

            </div>


        </div>

    </div>
@endsection


@push("scripts")

<script type="text/javascript">
const app = new Vue({
    el: '#dev-login',
    data() {
        return {
            email: "",
            password: "",
            errors:[]
        }
    },
    methods: {

        login() {

            axios.post("{{ url('/login') }}", {
                    email: this.email,
                    password: this.password
                })
                .then(res => {

                    if (res.data.success == true) {

                        swal({
                            title: "Excelente!",
                            text: res.data.msg,
                            icon: "success"
                        }).then(res => {
                            window.location.href = res.data.url
                        });
                        
                        this.email = ""
                        this.password = ""

                    } else {
                        swal({
                            title: "Lo sentimos!",
                            text: res.data.msg,
                            icon: "error"
                        });
                        //alert(res.data.msg)
                    }

                })
                .catch(err => {

                    this.errors = err.response.data.errors

                })

        }

    },
    created() {


    }
});
</script>

@endpush