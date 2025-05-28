<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Laravel</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-white bg-gray-900">

  <!-- HEADER -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-black bg-opacity-70 text-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="text-yellow-400 font-bold text-xl">PKL App</div>
      <nav class="flex items-center gap-4 text-sm">
        <a href="#home" class="hover:text-yellow-300">Home</a>
        <a href="#services" class="hover:text-yellow-300">Services</a>
        <a href="#gallery" class="hover:text-yellow-300">Gallery</a>
        <a href="#contact" class="hover:text-yellow-300">Contact</a>
        <a href="/login" class="hover:text-yellow-300">Login</a>
        <a href="/register" class="hover:text-yellow-300">Register</a>
      </nav>
    </div>
  </header>

  <!-- HERO / HOME -->
  <section id="home" style="background-image: url('/uploads/karnaval (1).jpeg')" class="h-screen bg-cover bg-center flex items-center justify-center relative">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Plan, Manage and Get Things Done All in One Place</h1>
      <p class="text-gray-300 max-w-xl mx-auto mb-6">Sistem digital untuk kelancaran PKL bagi pelajar dan pembimbing.</p>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="py-24 bg-white text-gray-900 text-center">
    <h2 class="text-3xl font-bold mb-6">Layanan Kami</h2>
    <p class="max-w-xl mx-auto mb-12 text-gray-600">Kami menyediakan berbagai fitur untuk mendukung kegiatan PKL.</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-6 max-w-6xl mx-auto">
      <div>
        <div class="text-yellow-400 text-5xl mb-4">📋</div>
        <h3 class="font-semibold text-lg mb-2">Manajemen PKL</h3>
        <p class="text-sm text-gray-600">Atur jadwal dan laporan PKL secara digital.</p>
      </div>
      <div>
        <div class="text-yellow-400 text-5xl mb-4">📊</div>
        <h3 class="font-semibold text-lg mb-2">Monitoring</h3>
        <p class="text-sm text-gray-600">Pantau progres siswa dan validasi laporan secara real-time.</p>
      </div>
      <div>
        <div class="text-yellow-400 text-5xl mb-4">👥</div>
        <h3 class="font-semibold text-lg mb-2">Kolaborasi</h3>
        <p class="text-sm text-gray-600">Saling terhubung antara siswa, guru, dan pembimbing lapangan.</p>
      </div>
    </div>
  </section>

  <!-- GALLERY -->
  <section id="gallery" class="py-24 bg-gray-100 text-gray-900 text-center">
  <h2 class="text-3xl font-bold mb-6">Galeri Kegiatan</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto px-6">
    <img src="/uploads/galery1.jpg" class="rounded shadow-lg w-full h-48 object-cover" alt="Foto 1">
    <img src="/uploads/galeri2.jpg" class="rounded shadow-lg w-full h-48 object-cover" alt="Foto 2">
    <img src="/uploads/galeri3.jpg" class="rounded shadow-lg w-full h-48 object-cover" alt="Foto 3">
    <img src="/uploads/galeri4.jpeg" class="rounded shadow-lg w-full h-48 object-cover" alt="Foto 4">
  </div>
</section>


  <!-- CONTACT -->
<section id="contact" class="py-24 bg-gray-900 text-white text-center">
  <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
  <p class="text-gray-300 mb-6 max-w-lg mx-auto">
    Jika ada pertanyaan seputar program PKL, silakan hubungi kami melalui kontak atau media sosial.
  </p>

  <!-- Sosial Media -->
  <div class="flex justify-center gap-6 mb-6">
    <!-- Instagram -->
    <a href="https://www.instagram.com/sijaantigedor" target="_blank" class="flex items-center gap-2 bg-pink-600 hover:bg-pink-700 px-4 py-2 rounded-md text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.25-.88a.88.88 0 110 1.75.88.88 0 010-1.75z"/>
      </svg>
      Instagram
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 32 32">
        <path d="M16.003 2.003A13.948 13.948 0 002.05 16.122c0 2.474.64 4.892 1.85 7.035l-1.954 5.79 5.964-1.938a13.916 13.916 0 007.093 1.825h.002a13.949 13.949 0 0013.948-13.948 13.949 13.949 0 00-13.948-13.883zm0 25.67a11.675 11.675 0 01-6.002-1.672l-.43-.26-3.537 1.151 1.16-3.414-.279-.44a11.653 11.653 0 011.935-14.418 11.64 11.64 0 0116.49.77 11.63 11.63 0 01-9.337 18.283zm6.472-8.504c-.352-.176-2.086-1.027-2.408-1.142-.322-.117-.556-.176-.79.176-.233.351-.91 1.141-1.116 1.373-.205.233-.41.263-.762.088-.352-.176-1.484-.546-2.825-1.742-1.043-.93-1.747-2.078-1.952-2.43-.205-.351-.021-.54.154-.716.158-.158.352-.41.528-.616.176-.205.234-.351.352-.586.117-.234.058-.439-.03-.615-.088-.176-.79-1.91-1.084-2.616-.285-.684-.577-.592-.79-.602-.205-.01-.439-.012-.673-.012-.234 0-.615.087-.937.439-.322.351-1.23 1.201-1.23 2.928s1.26 3.395 1.435 3.63c.176.234 2.476 3.793 5.995 5.318.838.36 1.491.575 2 .735.84.268 1.602.23 2.205.14.672-.1 2.086-.85 2.38-1.67.293-.82.293-1.524.205-1.67-.087-.146-.322-.234-.673-.41z"/>
      </svg>
      WhatsApp
    </a>
  </div>

  <p class="text-sm text-gray-400">&copy; 2025 PKL App - SMK SIJA</p>
</section>


</body>
</html>