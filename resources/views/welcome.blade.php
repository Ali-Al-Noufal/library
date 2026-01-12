<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    
</head>
    @if(session('message'))
    <div class="flex fixed z-999 top-0 items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800 shadow-sm" role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        
        <div class="ms-3 font-medium">
 {{ session('message') }}
        </div>
    </div>

@endif
<body class="bg-black w-screen h-screen flex justify-center items-center">

    <div class="w-100  bg-white border rounded-xl flex flex-col justify-between items-center p-10">
    <h1 class="text-3xl font-semibold">تسجيل بداية الدوام</h1>
    <form action={{ route('checkIn') }} method="POST" class="w-full h-60 flex flex-col justify-center my-5">
        @csrf
        <label for="name">اسم المستخدم</label>
        <input type="text" name="name" id="name" class="w-[90%] h-10 border rounded-lg px-3">
        <label for="password" class="mt-5"> كلمة السر</label>
        <input type="password" name="password" id="password" class="w-[90%] h-10 border rounded-lg px-3">
        <input type="submit" value="تسجيل حضور" class="w-[90%] h-10 border rounded-lg px-3 bg-slate-800 text-white mt-5">
    </form>
    <a href={{ route('end') }} class="underline text-lime-950 text-xl">تسجيل انتهاء الدوام</a>
    <button class="w-[90%] h-10 border rounded-lg px-3 bg-slate-800 text-white my-5"><a href={{ route('login') }}>تسجيل الدخول كصاحب موقع</a></button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>

</html>