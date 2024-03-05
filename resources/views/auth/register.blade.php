
 
 
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login Form </title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body>
  <div class="main_div">
    <div class="title">register Form</div>
 
    <form method="POST" action="{{ route('register') }}">
        @csrf

      <div class="input_box">
        <input type="text" @error('name') is-invalid @enderror"  placeholder="name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="text" @error('email') is-invalid @enderror"  placeholder="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="icon"><i class="fas fa-envelope"></i></div>
    </div>
  
      <div class="input_box">
        <input type="password" placeholder="Password"  name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="input_box" style="margin-bottom: 15px">
        <input type="password" type="password"  placeholder="confirm Password"  class="form-control" name="password_confirmation" required autocomplete="new-password">
 
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>


      <label class="checkbox" style=" gap: 10px; display: flex;  width: fit-content;     margin-bottom: 51px;">
        <input type="checkbox" name="organisateur" />
        <svg viewBox="0 0 21 18">

            <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
            </symbol>
            <defs>
                <mask id="tick">
                    <use class="tick mask" href="#tick-path" />
                </mask>
            </defs>
            <use class="tick" href="#tick-path" stroke="currentColor" />
            <path fill="white" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
        </svg>
        <svg class="lines" viewBox="0 0 11 11">
            <path d="M5.88086 5.89441L9.53504 4.26746" />
            <path d="M5.5274 8.78838L9.45391 9.55161" />
            <path d="M3.49371 4.22065L5.55387 0.79198" />
        </svg>
       <p style="    width: 235px;       " > Si vous voulez vous authentifier en tant qu'organisateur</p>


    </label>
      <div class="input_box button">
        <input type="submit" value="register">
      </div>
      <div class="sign_up">
    you have already account? <a href="{{route('login')}}">login now</a>
      </div>
    </form>
  </div>
  
</body>
</html>
 
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
html,body{
  display: grid;
  height: 100vh;
  place-items:center;
  background: #9C27B0;
}
.checkbox {
    --border-default: #bbbbc1;
    --border-hover: #9898a3;
    --active: #6E7BF2;
    --active-tick: #ffffff;
    display: block;
    width: 18px;
    height: 18px;
    cursor: pointer;
    position: relative;
    -webkit-tap-highlight-color: transparent;
    svg {
        display: block;
        position: absolute;
    }
    input {
        display: block;
        outline: none;
        border: none;
        padding: 0;
        margin: 0;
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 36% / 36%;
        box-shadow: inset 0 0 0 1.5px var(--border, var(--border-default));
        background: var(--background, transparent);
        transition: background .25s linear, box-shadow .25s linear;
        & + svg {
            width: 21px;
            height: 18px;
            left: 0;
            top: 0;
            color: var(--active);
            .tick {
                stroke-dasharray: 20;
                stroke-dashoffset: var(--stroke-dashoffset, 20);
                transition: stroke-dashoffset .2s;
                &.mask { 
                    stroke: var(--active-tick);
                }
            }
            & + svg {
                width: 11px;
                height: 11px;
                fill: none;
                stroke: var(--active);
                stroke-width: 1.25;
                stroke-linecap: round;
                top: -6px;
                right: -10px;
                stroke-dasharray: 4.5px;
                stroke-dashoffset: 13.5px;
                pointer-events: none;
                animation: var(--animation, none) .2s ease .175s;
            }
        }
        &:checked {
            --background: var(--active);
            --border: var(--active);
            & + svg {
                --stroke-dashoffset: 0;
                & + svg {
                    --animation: check;
                }
            }
        }
    }
    &:hover {
        input {
            &:not(:checked) {
                --border: var(--border-hover);
            }
        }
    }
}

@keyframes check {
    100% {
        stroke-dashoffset: 4.5px;
    }
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

* {
    box-sizing: inherit;
    &:before,
    &:after {
        box-sizing: inherit;
    }
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.main_div{
  width: 365px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
}
.main_div .title{
  text-align: center;
  font-size: 30px;
  font-weight: 600;
}
.main_div .social_icons{
  margin-top: 20px;
  display: flex;
  justify-content: center;
}
.social_icons a{
  display: block;
  height: 45px;
  width: 100%;
  line-height: 45px;
  text-align: center;
  border-radius: 5px;
  font-size: 20px;
  color: #fff;
  text-decoration: none;
  transition: all 0.3s linear;
}
.social_icons a span{
  margin-left: 5px;
  font-size: 18px;
}
.social_icons a:first-child{
  margin-right: 5px;
  background: #4267B2;
}
.social_icons a:first-child:hover{
  background: #375695;
}
.social_icons a:last-child{
  margin-left: 5px;
  background: #1DA1F2;
}
.social_icons a:last-child:hover{
  background: #0d8bd9;
}
form {
  margin-top: 25px;
}
form .input_box{
  height: 50px;
  width: 100%;
  position: relative;
  margin-top: 15px;
}
.input_box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: 1px solid lightgrey;
  border-radius: 5px;
  padding-left: 45px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.input_box input:focus{
  border-color: #9C27B0;
}
.input_box .icon{
  position: absolute;
  top: 50%;
  left: 20px;
  transform: translateY(-50%);
  color: grey;
}
form .option_div{
  margin-top: 5px;
  display: flex;
  justify-content: space-between;
}
.option_div .check_box{
  display: flex;
  align-items: center;
}
.option_div span{
  margin-left: 5px;
  font-size: 16px;
  color: #333;
}
.option_div .forget_div a{
  font-size: 16px;
  color: #9C27B0;
}
.button input{
  padding-left: 0;
  background: #9C27B0;
  color: #fff;
  border: none;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s linear;
}
.button input:hover{
  background: #a720c5;
}
form .sign_up{
  text-align: center;
  margin-top: 25px;
}
.sign_up a{
  color: #9C27B0;
}
form a{
  text-decoration: none;
}
form a:hover{
  text-decoration: underline;
}

</style>
