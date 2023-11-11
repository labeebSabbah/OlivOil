<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الاستعلام عن الطلب</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body dir="rtl">
  <!-- component -->
  <div class="min-h-screen p-6 bg-gray-100 flex flex-col items-center justify-center">
    <a href="{{ route('home') }}" class="md:absolute top-0 right-0 p-5 float-right">
      <img src="{{ asset('moy.jpeg') }}" alt="Moy Logo"
        class="scale-110 transition-all rounded-full w-14 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
    </a>

    <div class="container max-w-screen-lg mx-auto">

      <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-1 !text-center">
            <div class="text-gray-600">
              <p class="font-medium text-lg">تم تعبئة الطلب بنجاح بتاريخ {{ $order->created_at }}</p>
              <p>سيتم التواصل معك قريبا ان شاء الله.</p>
            </div>

            <div class="lg:col-span-1">
              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-1">
                
                <div class="md:col-span-2">
                    <h1 class="font-medium text-lg">عدد التنكات المطلوب</h1>
                </div>

                <div class="md:col-span-2">
                    <h1 class="font-bold text-2xl">{{ $order->amount }}</h1>
                </div>

                <div class="md:col-span-2">
                    <h1 class="font-medium text-lg">مكان الانتاج</h1>
                </div>

                <div class="md:col-span-2">
                    <h1 class="font-bold text-2xl">
                        {{ $order->location }}
                    </h1>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
</body>

</html>