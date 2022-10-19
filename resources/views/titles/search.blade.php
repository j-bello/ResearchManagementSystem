<x-app-layout>

    <!DOCTYPE html>

    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">


       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      </head>
      <body>
        <div class="wrapper">

        <img src="/uploads/logo.png" class="logo">

          <div class="search-input">

            <a href="" target="_blank" hidden></a>
            <input type="text" placeholder="Type to search..">
            <div class="autocom-box">
              <!-- here list are inserted from javascript -->
            </div>
            <div class="icon"><i class="fas fa-search"></i></div>
          </div>

        </div>



         <script type="text/javascript">
    let suggestions = [
        "Online E-Learning System",
        "OJT Timesheet Monitoring System",
        "Online Examination System",
        "Student Tracking Performance",
        "Library Information System",
        "Student Information System",
        "Student Handbook Application",
        "Thesis and Capstone Archiving System",
        "School Portal Application",
        "School Events Attendance System",
        "Grading System",
        "Freelancer",
        "Facebook Page",
        "Designer",
        "Developer",
        "Web Designer",
        "Web Developer",
        "Login Form in HTML & CSS",
        "How to learn HTML & CSS",
        "How to learn JavaScript",
        "How to became Freelancer",
        "How to became Web Designer",
        "How to start Gaming Channel",
        "How to start YouTube Channel",
        "What does HTML stands for?",
        "What does CSS stands for?",
        "Student Profile and Guidance Services with Decision Support",
        "Faculty Evaluation Systemr",
        "Online School Documents Processing with Payment System",
        "Class Scheduling System",
        "Student Council Voting System",
        "Android Based E-learning",
        "OJT Records Monitoring System",
    ];


        </script>
         <script type="text/javascript">
    // getting all required elements
    const searchWrapper = document.querySelector(".search-input");
    const inputBox = searchWrapper.querySelector("input");
    const suggBox = searchWrapper.querySelector(".autocom-box");
    const icon = searchWrapper.querySelector(".icon");
    let linkTag = searchWrapper.querySelector("a");
    let webLink;

    // if user press any key and release
    inputBox.onkeyup = (e)=>{
        let userData = e.target.value; //user enetered data
        let emptyArray = [];
        if(userData){
            icon.onclick = ()=>{
                webLink = `https://www.google.com/search?q=${userData}`;
                linkTag.setAttribute("href", webLink);
                linkTag.click();
            }
            emptyArray = suggestions.filter((data)=>{
                //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
            emptyArray = emptyArray.map((data)=>{
                // passing return data inside li tag
                return data = `<li>${data}</li>`;
            });
            searchWrapper.classList.add("active"); //show autocomplete box
            showSuggestions(emptyArray);
            let allList = suggBox.querySelectorAll("li");
            for (let i = 0; i < allList.length; i++) {
                //adding onclick attribute in all li tag
                allList[i].setAttribute("onclick", "select(this)");
            }
        }else{
            searchWrapper.classList.remove("active"); //hide autocomplete box
        }
    }

    function select(element){
        let selectData = element.textContent;
        inputBox.value = selectData;
        icon.onclick = ()=>{
            webLink = `https://www.google.com/search?q=${selectData}`;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }
        searchWrapper.classList.remove("active");
    }

    function showSuggestions(list){
        let listData;
        if(!list.length){
            userValue = inputBox.value;
            listData = `<li>${userValue}</li>`;
        }else{
          listData = list.join('');
        }
        suggBox.innerHTML = listData;
    }

          </script>

      </body>
    </html>

    </x-app-layout>


    <style>

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body{
      background: #fff:
      padding: 0 20px;
    }
    .logo {
      display: block;
      margin-left: auto;
      margin-right: auto;
      max-width:100%;
      height: 12rem;
    }


    ::selection{
      color: #fff;
      background: #664AFF;
    }

    .wrapper{
      max-width: 50rem;
      margin: 150px auto;
    }

    .wrapper .search-input{
      background: #fff;
      width: 100%;

      border-radius: 5px;
      position: relative;
      box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);

    }

    .search-input input{
      height: 55px;
      width: 100%;
      outline: none;
      border: none;
      border-radius: 5px;
      padding: 0 60px 0 20px;
      font-size: 18px;
      box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    }

    .search-input.active input{
      border-radius: 5px 5px 0 0;
    }

    .search-input .autocom-box{
      padding: 0;
      opacity: 0;
      pointer-events: none;
      max-height: 280px;
      overflow-y: auto;
    }

    .search-input.active .autocom-box{
      padding: 10px 8px;
      opacity: 1;
      pointer-events: auto;
    }

    .autocom-box li{
      list-style: none;
      padding: 8px 12px;
      display: none;
      width: 100%;
      cursor: default;
      border-radius: 3px;
    }

    .search-input.active .autocom-box li{
      display: block;
    }
    .autocom-box li:hover{
      background: #efefef;
    }

    .search-input .icon{
      position: absolute;
      right: 0px;
      top: 0px;
      height: 55px;
      width: 55px;
      text-align: center;
      line-height: 55px;
      font-size: 20px;
      color: #FFBF00;
      cursor: pointer;
    }

    </style>
