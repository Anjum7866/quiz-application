<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
  
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
   
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");
:root {
	/* ============= COLORS ============= */
	--black-82: #222222;
	--black-8\5: #282c34;
	--black-8\6: #21252b;
	--white-100: #ffffff;
	--white-92: #f2f2f2;
  --violet:#6c5ce7;
  --pink:#FC427B;
  /* --gradient:linear-gradient(90deg, var(--violet), var(--pink)); */
  --gradient:linear-gradient(108deg,#46d3ff .14%,#6178ff 24.02%,#a750ff 39.05%,#ff1ec0 56.82%,#ff784b 77.82%,#ffce51 95.45%);

	/* ============= GRADIENT COLORS =============
	--gradient-1: linear-gradient(to right, #9cecfb, #65c7f7, #0052d4);
	--gradient-2: linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b); */

	/* ============= PADDING ============= */
	--padding-1: 1rem;
	--padding-2: 2rem;

	/* ============= BORDER RADIUS ============= */
	--border-5: 5px;

	/* ============= FONT FAMILY ============= */
	--font-family-poppins: "poppins", sans-serif;

	/* ============= FONT SIZE ============= */
	--font-size-1: 1rem;

	/* ============= FONT WEIGHT ============= */
	--font-regular: 400;
	--font-medium: 500;
	--font-semi-bold: 600;
}
body {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	background-color: var(--black-82);
}

* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: var(--font-family-poppins);
}
.flex{
display:flex;
}
.content-left{
	width:50%;
	margin:auto; 
	margin-right:50px
}
.content-right{
	width:50%
}
@media (max-width: 825px) {
	.flex{
display:block;
}
.content-left{
	width:100%;
	margin:auto; 
}
.content-right{
	width:100%;
	margin:auto; 
}
}
h3{
  font-family: 'Pacifico', cursive;
  color: transparent;
background: var(--gradient);
-webkit-background-clip: text;
background-clip: text;
font-size: 3rem;
}
h4{
  color: transparent;
background: var(--gradient);
-webkit-background-clip: text;
background-clip: text;
font-size: 2.5rem;
}
.form-bg {
	position: relative;
	padding: calc(var(--padding-1) / 4);
	border-radius: var(--border-5);
	min-width: 260px;
	width: 100%;
	max-width: 400px;
	background-color: var(--black-8\6);
	overflow: hidden;
}

.form-bg::before {
	content: "";
	position: absolute;
	top: -50%;
	left: -50%;
	width: 450px;
	height: 450px;
	background: var(--gradient);
	transform-origin: bottom right;
	z-index: 1;
	animation: rotate 5s infinite linear;
}

.form-bg::after {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	width: 450px;
	height: 450px;
	background: var(--gradient);
	transform-origin: top left;
	z-index: 1;
	animation: rotate 5s infinite linear;
}

@keyframes rotate {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}

.form {
	display: flex;
	flex-direction: column;
	row-gap: 1.5rem;
	position: relative;
	padding: var(--padding-2);
	width: 100%;
	background-color: var(--black-8\5);
	border-radius: var(--border-5);
	z-index: 10;
}

.form__title h1 {
	text-transform: capitalize;
	font-weight: var(--font-semi-bold);
	color: var(--white-92);
}

.form__field {
	display: flex;
	flex-direction: column;
	row-gap: 10px;
}

.form__label {
	font-size: var(--font-size-1);
	font-weight: var(--font-regular);
	text-transform: capitalize;
	color: var(--white-92);
}

.form__input {
	border: none;
	outline: none;
	padding: calc(var(--padding-1) / 2);
	border-radius: var(--border-5);
	background-color: var(--white-100);
	font-size: var(--font-size-1);
}

.form__links {
	display: flex;
	justify-content: space-between;
}

.form__link a{
	text-transform: capitalize;
	text-decoration: none;
	color: var(--white-92);
}

.form__link a:hover {
	text-decoration: underline;
}

.form__btn {
	border: none;
	outline: none;
	width: 100%;
	padding: calc(var(--padding-1) / 2);
	border-radius: var(--border-5);
	background-color: var(--white-100);
	font-size: var(--font-size-1);
	font-weight: var(--font-medium);
	text-transform: capitalize;
	color: var(--black-8\5);
	cursor: pointer;
}

.form__btn:hover {
	background-color: var(--white-92);
}
    </style>
    
</head>
<body data-base-url="{{ url('/') }}">

            @yield('content')
   
   
</body>
</html>
