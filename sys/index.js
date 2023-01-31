body = document.body;

customer = document.getElementById('customer');
stock_manager = document.getElementById('stock_manager');
accountant = document.getElementById('accountant');

trig(customer);
trig(stock_manager);
trig(accountant,"public\\php\\login_process.php");


//------------------- functions--------------------------------------

function trig(__userType,login_link){
    __userType.addEventListener('click',()=>{
   
        loginForm = document.createElement("form");
        loginForm.setAttribute("method","post");
        loginForm.setAttribute("name","login_form");
        lg_st = loginForm.style;
        
        lg_st.backgroundColor = "rgba(54, 28, 22,.8)";
        lg_st.height = "60%";
        lg_st.width = "70%";
        lg_st.border = "1px solid white";
        lg_st.position ="absolute";
        lg_st.top = "50%";
        lg_st.transform = "translateY(-50%)";
        lg_st.left = "15%";
        lg_st.display = "flex";
        lg_st.alignItems = "center";
        lg_st.justifyContents = "center";
        body.appendChild(loginForm);
        loginFormInputs = document.createElement("div");
        loginFormInputs.setAttribute("class","input_holder");
        loginForm.appendChild(loginFormInputs);
        input_user_email =  document.createElement("input");
        input_user_email.setAttribute("type","text");
        input_user_email.setAttribute("name","user_email");
        input_user_email.setAttribute("placeholder","name@example.com");
        
        
        input_password =  document.createElement("input");
        input_password.setAttribute("type","password");
        input_password.setAttribute("name","password");
        input_password.setAttribute("placeholder","*********");
        
        input_submit =  document.createElement("input");
        input_submit.setAttribute("type","submit");
        input_submit.setAttribute("value","Login");
        // loginForm.appendChild(input_submit);

        loginFormInputs.appendChild(input_user_email);
        loginFormInputs.appendChild(input_password);
        loginFormInputs.appendChild(input_submit);
        p = document.createElement("p");
        p.setAttribute("class","forgate_password");
        loginFormInputs.appendChild(p);
        anchor = document.createElement("a");
        anchor.setAttribute("href","#");
        anchor.innerHTML = "Forgot Password?"
        p.appendChild(anchor);
        
        input_hidden =  document.createElement("input");
        input_hidden.setAttribute("type","hidden");
        input_hidden.setAttribute("name","User_type");
        input_hidden.setAttribute("value",__userType);
        
        
        close_btn = document.createElement("input");
        close_btn.setAttribute("type","button");
        close_btn.setAttribute("class","close");
        close_btn.setAttribute("value","x");
        loginForm.appendChild(close_btn);
        
        form = document.forms[0];
        close_btn.addEventListener("click",()=>{
            lg_st.display = "none";
        });

        input_submit.onclick = (e)=>{
            
            e.preventDefault();
            var form_data = new FormData(form);
            sendDataRequest = new XMLHttpRequest();
            sendDataRequest.open("POST",login_link,true);
        
            sendDataRequest.onload = () =>{
                if(sendDataRequest.status == 200){
                    data_array = JSON.parse(sendDataRequest.response);
                    if(data_array == 0){
                        alert("One or more inputs are empty");
                    }else if(data_array ==1){
                        alert("User not found, Please review the credentials");
                    }else if(data_array.code == 2){
                        window.location.replace(data_array.link);
                    } // this is not safe due to any error could result in unautholised login.
                   
                }else{
                    // console.log("failed to load data"); //review this issue, as it would interveen when the user enters invalid combunations
                }
            };
            for(const value of form_data.keys()){
                console.log(value);
            }
            sendDataRequest.send(form_data);
        }

        });




}
