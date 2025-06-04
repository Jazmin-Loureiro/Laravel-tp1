<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mi Blog</title>
  <script src="https://cdn.tailwindcss.com"></script> 
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
   

    <main class="flex-1 p-4 overflow-auto">
      @yield('content')
    </main>
  </div>
</body>
</html>
