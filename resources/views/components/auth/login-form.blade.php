<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br>
                    <label for="email">Email Address</label>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br>
                    <label for="password">Password</label>
                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                    <br>
                    <button onclick="OnLogin()" class="btn w-100 bg-gradient-primary">Next</button>
                    <hr>
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{url('/user-registration')}}">Sign Up </a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{url('/user-send-otp')}}">Forget Password</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    async function OnLogin(){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if(email.length === 0)
        {
            errorToast('Email Required');
        }
        else if (password.length===0)
        {
            errorToast('Password Required');
        }
        else if (password.length < 8)
        {
            errorToast('Login Failed')
        }
        else
        {
            showLoader();
            let response = await axios.post('/user-login',{ email:email, password:password });
            hideLoader();

            if(response.status===200 && response.data['status']==='Successful') {
                successToast(response.data['message']);
                setTimeout(function (){
                    window.location.href="/user-dashboard";
                },1000);
            } else {
                errorToast(response.data['message']);
            }
        }
    }

</script>
