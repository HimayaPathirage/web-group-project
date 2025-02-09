            const form = document.getElementById('form');
            const password = document.getElementById('password');
            const cpassword = document.getElementById('cpassword');
            const pswdMsg = document.getElementById('pswdMsg');
            const cpswdMsg = document.getElementById('cpswdMsg');

            function validatePassword(){
                const pswdValue  = password.value.trim();
                const cpswdValue = cpassword.value.trim();
                
                if (pswdValue .length < 8) {
                    pswdMsg.innerHTML = 'Password should contain minimum 8 characters';
                    return false;
                }
                
                if (!/[A-Z]/.test(pswdValue)) {
                    pswdMsg.innerHTML = 'Password should contain at least 1 Uppercase';
                    return false;
                }
                if (!/\d/.test(pswdValue)) {
                    pswdMsg.innerHTML = 'Password should contain at least 1 Numeric';
                    return false;
                }
                if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pswdValue)) {
                    pswdMsg.innerHTML = 'Password should contain at least 1 Special Character';
                    return false;
                }
                if(pswdValue!==cpswdValue){
                    alert("Passwords do not match");
                    return false;
                }
                pswdMsg.innerHTML ="";
                return true;
            
            }
            form.addEventListener('submit',function(e){
                debugger;  
                    const pswdValidity = validatePassword();
                    debugger;
                    if(!pswdValidity){
                        
                        e.preventDefault();
                    }
            });

            function getSelectValue(){
                var selectedValue = document.getElementById('usertype').value;
                console.log(selectedValue);
            }
            
