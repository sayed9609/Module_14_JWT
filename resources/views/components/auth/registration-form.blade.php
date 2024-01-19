<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label for="email">Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label for="first_name">First Name</label>
                                <input id="first_name" placeholder="First Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" placeholder="Last Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label for="mobile">Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="number"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label for="password">Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="OnRegistration()" class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    async function OnRegistration(){

        let email = document.getElementById('email').value;
        let first_name = document.getElementById('first_name').value;
        let last_name = document.getElementById('last_name').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;


        if(email.length === 0)
        {
            errorToast('Valid Email Required');
        }
        else if(first_name.length === 0)
        {
            errorToast('First Name Required');
        }
        else if(last_name.length === 0)
        {
            errorToast('Last Name Required');
        }
        else if(mobile.length === 0)
        {
            errorToast('Mobile Number Required');
        }
        else if(password.length === 0)
        {
            errorToast('Password Required');
        }
        else if(password.length < 8)
        {
            errorToast('Password Must Be At Least 8 Characters Long');
        }
        else {

            showLoader();
            let result = await axios.post('/user-registration',{
                first_name:first_name,
                last_name:last_name,
                email:email,
                mobile:mobile,
                password:password
            });
            hideLoader();

            if(result.status === 200 && result.data['status'] === 'Successful')
            {
                successToast(result.data['message']);
                setTimeout(function (){
                    window.location.href='/user-login'
                },2000);
            }
            else
            {
                errorToast(result.data['message']);
            }
        }

    }





































  // async function onRegistration() {
  //
  //       let email = document.getElementById('email').value;
  //       let firstName = document.getElementById('firstName').value;
  //       let lastName = document.getElementById('lastName').value;
  //       let mobile = document.getElementById('mobile').value;
  //       let password = document.getElementById('password').value;
  //
  //       if(email.length===0){
  //           errorToast('Email is required')
  //       }
  //       else if(firstName.length===0){
  //           errorToast('First Name is required')
  //       }
  //       else if(lastName.length===0){
  //           errorToast('Last Name is required')
  //       }
  //       else if(mobile.length===0){
  //           errorToast('Mobile is required')
  //       }
  //       else if(password.length===0){
  //           errorToast('Password is required')
  //       }
  //       else{
  //           showLoader();
  //           let res=await axios.post("/user-registration",{
  //               email:email,
  //               firstName:firstName,
  //               lastName:lastName,
  //               mobile:mobile,
  //               password:password
  //           })
  //           hideLoader();
  //           if(res.status===200 && res.data['status']==='success'){
  //               successToast(res.data['message']);
  //               setTimeout(function (){
  //                   window.location.href='/userLogin'
  //               },2000)
  //           }
  //           else{
  //               errorToast(res.data['message'])
  //           }
  //       }
  //   }
</script>
