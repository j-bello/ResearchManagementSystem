<x-app-layout>
    
<style>
    ul {
  list-style-type: none;
  overflow: hidden;
}

li {
  float: right;
}

li a {
  color: #000;
  display: block;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size:14px;
}
li a:hover {
  text-decoration: underline;
}
.grid{
  height:23px;
  position:relative;
  bottom:4px;
}
.signbutton{
  background-color: #4885ed;
  color: #fff;
  border:none;
  border-radius:3px;
  padding:7px 10px;
  position:relative;
  bottom:7px;
  font-weight:bold;
}
.logo{
  margin-top:200px;
  margin-bottom:20px;
}
.bar{
  margin:0 auto;
  width:575px;
  border-radius:30px;
  border:1px solid #dcdcdc;
}
.bar:hover{
  box-shadow: 1px 1px 8px 1px #dcdcdc;
}
.bar:focus-within{
  box-shadow: 1px 1px 8px 1px #dcdcdc;
  outline:none;
}
.searchbar{
  height:45px;
  border:none;
  width:500px;
  font-size:16px;
  outline: none;

}
.voice{
  height:20px;
  position:relative;
  top:5px;
  left:10px;
}
.buttons{
  margin-top:30px;
}
.button{
  background-color: #f5f5f5;
  border:none;
  color:#707070;
  font-size:15px;
  padding: 10px 20px;
  margin:5px;
  border-radius:4px;
  outline:none;
}
.button:hover{
  border: 1px solid #c8c8c8;
  padding: 9px 19px;
  color:#808080;
}
.button:focus{
  border:1px solid #4885ed;
  padding: 9px 19px;
}


</style>
    <div>
        <div class="max-w-7xl mx-auto py-0 sm:px-6 lg:px-8">


              <center>
                <header>

                </header>
                <div class="logo">
                  <img src="/uploads/logo.jpg">
                </div>
                <div class="bar">
                  <input class="searchbar" type="text" title="Search">
                </div>
                <div class="buttons">
                  <button class="button" type="button">Search</button>
                 </div>
              </body>

        </div>
    </div>


</x-app-layout>
