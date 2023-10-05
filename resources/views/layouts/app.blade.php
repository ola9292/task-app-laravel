<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Task List App</title>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
        @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link {
        @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label {
        @apply block uppercase text-slate-700 mb-2
        }
        input,
        textarea {
        @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error {
        @apply text-red-500 text-sm
        }
    </style>
    <style>
        .cancel-btn{
            position: absolute;
            top:0;
            right: 6px;

        }
        .cancel-btn:hover{
            color: grey;
            cursor:pointer;
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">

                <h1 class="mb-4 text-2xl">@yield('title')</h1>
                @yield('styles')

                <div>
                    @if(session()->has('message'))
                    <div id="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                                role="alert">
                        <strong>Success!</strong>
                        <div>{{session('message')}}</div>
                        <span class="cancel-btn" id="cancel-btn">X</span>
                    </div>

                    @endif
                    @yield('content')
                </div>
<script>
    cancelBtn = document.getElementById('cancel-btn')
    flash = document.getElementById('flash')
    cancelBtn.addEventListener('click',function(){
        flash.style.display = "none";
    })
</script>
</body>
</html>
