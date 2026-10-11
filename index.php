<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twibbon Generator - OSIS SKAWAN 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .canvas-container {
            touch-action: none;
        }
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 flex flex-col justify-between">

    <!-- Header Aplikasi -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white shadow-md shadow-indigo-200">
                    <i class="fa-solid fa-id-badge text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Twibbon OSIS SKAWAN 2026
                    </h1>
                    <p class="text-xs text-slate-500 font-medium">Format Portret Instagram (1080 x 1440 px)</p>
                </div>
            </div>
            
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600 border border-indigo-200">
                    <i class="fa-solid fa-lock text-[10px]"></i>
                    Frame Dikunci
                </span>
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="max-w-6xl mx-auto px-4 py-8 w-full flex-1">
        <!-- Panduan 3 Langkah Praktis -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm shrink-0">1</div>
                <div>
                    <h3 class="font-semibold text-slate-800 text-sm">Pilih Foto Kamu</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Unggah foto pribadi terbaik dari galeri HP atau komputer.</p>
                </div>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm shrink-0">2</div>
                <div>
                    <h3 class="font-semibold text-slate-800 text-sm">Atur Posisi & Ukuran</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Geser, perbesar/perkecil, atau putar foto agar pas di bingkai.</p>
                </div>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm shrink-0">3</div>
                <div>
                    <h3 class="font-semibold text-slate-800 text-sm">Unduh Hasil Twibbon</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Klik tombol download dan siap dibagikan ke media sosial.</p>
                </div>
            </div>
        </div>

        <!-- Section Editor & Controls -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Sisi Kiri: Pratinjau Kanvas -->
            <div class="lg:col-span-7 flex flex-col items-center">
                <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/50 w-full max-w-[440px]">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                            <i class="fa-solid fa-eye text-indigo-500"></i> Pratinjau Kanvas
                        </span>
                        <span class="text-xs text-slate-400 font-mono">1080 x 1440 px (3:4)</span>
                    </div>

                    <!-- Area Kanvas Interaktif dengan Rasio 3:4 -->
                    <div class="relative w-full aspect-[3/4] bg-slate-100 rounded-2xl overflow-hidden border border-slate-200 flex items-center justify-center shadow-inner canvas-container group cursor-grab active:cursor-grabbing" id="canvasWrapper">
                        <canvas id="twibbonCanvas" class="w-full h-full block rounded-2xl"></canvas>
                        
                        <!-- Overlay Hint saat belum upload foto -->
                        <div id="canvasPlaceholder" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center bg-slate-50/90 pointer-events-none transition-opacity duration-300">
                            <div class="w-16 h-16 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center text-2xl mb-3 shadow-sm border border-indigo-100">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <p class="font-semibold text-slate-700 text-sm">Foto Belum Dipilih</p>
                            <p class="text-xs text-slate-400 mt-1 max-w-[220px]">Silakan unggah foto kamu di panel samping untuk memulai.</p>
                        </div>
                    </div>

                    <p class="text-center text-xs text-slate-400 mt-3 flex items-center justify-center gap-1">
                        <i class="fa-solid fa-hand-pointer text-slate-400"></i> Drag / sentuh langsung pada kanvas untuk menggeser foto
                    </p>
                </div>
            </div>

            <!-- Sisi Kanan: Panel Kontrol -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Panel 1: Unggah Foto Pengguna -->
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <h2 class="font-bold text-slate-800 text-base mb-4 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs">1</span>
                        Unggah Foto Kamu
                    </h2>

                    <label for="userPhotoInput" class="flex flex-col items-center justify-center w-full h-32 border-2 border-indigo-200 border-dashed rounded-2xl cursor-pointer bg-indigo-50/40 hover:bg-indigo-50 transition-colors group">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-image text-2xl text-indigo-500 mb-2 group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs font-semibold text-slate-700">Pilih Foto dari Perangkat</p>
                            <p class="text-[11px] text-slate-400 mt-0.5">PNG, JPG, JPEG, WEBP</p>
                        </div>
                        <input id="userPhotoInput" type="file" accept="image/*" class="hidden" />
                    </label>
                </div>

                <!-- Panel 2: Kontrol Foto (Zoom, Rotate, Reset) -->
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm opacity-60 pointer-events-none transition-all duration-300" id="controlsPanel">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-bold text-slate-800 text-base flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs">2</span>
                            Atur Posisi & Ukuran Foto
                        </h2>
                        <button id="btnReset" class="text-xs font-semibold text-rose-500 hover:text-rose-600 flex items-center gap-1 py-1 px-2.5 rounded-lg hover:bg-rose-50 transition-colors">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                    </div>

                    <div class="space-y-4">
                        <!-- Zoom Slider -->
                        <div>
                            <div class="flex justify-between text-xs font-medium text-slate-600 mb-1.5">
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-magnifying-glass-plus text-indigo-500"></i> Skala / Zoom</span>
                                <span id="zoomValue" class="text-slate-400 font-mono">100%</span>
                            </div>
                            <input type="range" id="zoomSlider" min="0.1" max="3" step="0.01" value="1" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-indigo-600">
                        </div>

                        <!-- Rotation Slider -->
                        <div>
                            <div class="flex justify-between text-xs font-medium text-slate-600 mb-1.5">
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-arrows-rotate text-indigo-500"></i> Rotasi Gambar</span>
                                <span id="rotateValue" class="text-slate-400 font-mono">0°</span>
                            </div>
                            <input type="range" id="rotateSlider" min="-180" max="180" step="1" value="0" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-indigo-600">
                        </div>

                        <!-- Tombol Rotasi Cepat -->
                        <div class="flex gap-2 pt-1">
                            <button id="btnRotateCcw" class="flex-1 py-2 px-3 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-rotate-left text-slate-400"></i> -90°
                            </button>
                            <button id="btnRotateCw" class="flex-1 py-2 px-3 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-rotate-right text-slate-400"></i> +90°
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tombol Unduh Utama -->
                <button id="btnDownload" disabled class="w-full py-4 px-6 rounded-2xl bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-bold text-base shadow-lg shadow-indigo-200 disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed transition-all transform active:scale-[0.99] flex items-center justify-center gap-3">
                    <i class="fa-solid fa-download text-lg"></i>
                    Unduh Twibbon (.PNG)
                </button>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-6 mt-12 text-center text-xs text-slate-400">
        <div class="max-w-6xl mx-auto px-4">
            <p>© Twibbon OSIS SKAWAN 2026 • SMKN 1 Wanayasa</p>
        </div>
    </footer>

    <!-- Logika JavaScript -->
    <script>
        // =========================================================================
        // PENGATURAN LINK BINGKAI/FRAME TWIBBON UTAMA
        // =========================================================================
        const FIXED_FRAME_URL = "1791689336178.png";
        
        // Inisialisasi Elemen DOM
        const canvas = document.getElementById('twibbonCanvas');
        const ctx = canvas.getContext('2d');
        const userPhotoInput = document.getElementById('userPhotoInput');
        const zoomSlider = document.getElementById('zoomSlider');
        const zoomValue = document.getElementById('zoomValue');
        const rotateSlider = document.getElementById('rotateSlider');
        const rotateValue = document.getElementById('rotateValue');
        const btnRotateCcw = document.getElementById('btnRotateCcw');
        const btnRotateCw = document.getElementById('btnRotateCw');
        const btnReset = document.getElementById('btnReset');
        const btnDownload = document.getElementById('btnDownload');
        const controlsPanel = document.getElementById('controlsPanel');
        const canvasPlaceholder = document.getElementById('canvasPlaceholder');
        const canvasWrapper = document.getElementById('canvasWrapper');

        // Dimensi Kanvas Proporsi Portret Instagram 3:4 (1080 x 1440)
        const CANVAS_WIDTH = 1080;
        const CANVAS_HEIGHT = 1440;
        canvas.width = CANVAS_WIDTH;
        canvas.height = CANVAS_HEIGHT;

        // State Gambar
        let userImage = null;
        let frameImage = new Image();
        frameImage.crossOrigin = "anonymous";

        // Parameter Transformasi Foto Pengguna
        let photoState = {
            x: CANVAS_WIDTH / 2,
            y: CANVAS_HEIGHT / 2,
            scale: 1,
            rotation: 0,
            baseWidth: 0,
            baseHeight: 0
        };

        // State Interaksi Drag (Mouse & Touch)
        let isDragging = false;
        let dragStartX = 0;
        let dragStartY = 0;

        // Memuat Frame Terkunci
        function loadFixedFrame() {
            frameImage.src = FIXED_FRAME_URL;
        }

        frameImage.onload = () => {
            render();
        };

        frameImage.onerror = () => {
            console.warn("Gagal memuat gambar frame: " + FIXED_FRAME_URL);
        };

        loadFixedFrame();

        function render() {
            ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);

            // 1. Gambar Foto Pengguna (Di Lapisan Bawah)
            if (userImage) {
                ctx.save();
                ctx.translate(photoState.x, photoState.y);
                ctx.rotate((photoState.rotation * Math.PI) / 180);
                ctx.scale(photoState.scale, photoState.scale);

                const drawW = photoState.baseWidth;
                const drawH = photoState.baseHeight;
                ctx.drawImage(userImage, -drawW / 2, -drawH / 2, drawW, drawH);

                ctx.restore();
            } else {
                ctx.fillStyle = '#f1f5f9';
                ctx.fillRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
            }

            // 2. Gambar Frame Twibbon Terkunci (Di Lapisan Atas)
            if (frameImage.complete && frameImage.naturalWidth !== 0) {
                ctx.drawImage(frameImage, 0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
            }
        }

        // Upload Foto Pengguna
        userPhotoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (event) => {
                const img = new Image();
                img.onload = () => {
                    userImage = img;
                    
                    // Hitung skala awal agar foto memenuhi area kanvas portret 3:4
                    const scaleFactor = Math.max(CANVAS_WIDTH / img.width, CANVAS_HEIGHT / img.height);
                    photoState.baseWidth = img.width * scaleFactor;
                    photoState.baseHeight = img.height * scaleFactor;
                    
                    resetPhotoPosition();

                    // Aktifkan Kontrol UI & Sembunyikan Placeholder
                    controlsPanel.classList.remove('opacity-60', 'pointer-events-none');
                    canvasPlaceholder.classList.add('opacity-0', 'pointer-events-none');
                    btnDownload.disabled = false;

                    render();
                };
                img.src = event.target.result;
            };
            reader.readAsDataURL(file);
        });

        function resetPhotoPosition() {
            photoState.x = CANVAS_WIDTH / 2;
            photoState.y = CANVAS_HEIGHT / 2;
            photoState.scale = 1;
            photoState.rotation = 0;
            
            zoomSlider.value = 1;
            zoomValue.textContent = '100%';
            rotateSlider.value = 0;
            rotateValue.textContent = '0°';
        }

        // Event Listener Slider Zoom & Rotasi
        zoomSlider.addEventListener('input', (e) => {
            photoState.scale = parseFloat(e.target.value);
            zoomValue.textContent = `${Math.round(photoState.scale * 100)}%`;
            render();
        });

        rotateSlider.addEventListener('input', (e) => {
            photoState.rotation = parseInt(e.target.value, 10);
            rotateValue.textContent = `${photoState.rotation}°`;
            render();
        });

        btnRotateCcw.addEventListener('click', () => {
            photoState.rotation = (photoState.rotation - 90 < -180) ? 90 : photoState.rotation - 90;
            rotateSlider.value = photoState.rotation;
            rotateValue.textContent = `${photoState.rotation}°`;
            render();
        });

        btnRotateCw.addEventListener('click', () => {
            photoState.rotation = (photoState.rotation + 90 > 180) ? -90 : photoState.rotation + 90;
            rotateSlider.value = photoState.rotation;
            rotateValue.textContent = `${photoState.rotation}°`;
            render();
        });

        btnReset.addEventListener('click', () => {
            if (!userImage) return;
            resetPhotoPosition();
            render();
        });

        // Event Listener Drag Foto (Mouse & Touch Screen)
        function getCanvasCoordinates(e) {
            const rect = canvas.getBoundingClientRect();
            const clientX = e.touches ? e.touches[0].clientX : e.clientX;
            const clientY = e.touches ? e.touches[0].clientY : e.clientY;

            const scaleX = CANVAS_WIDTH / rect.width;
            const scaleY = CANVAS_HEIGHT / rect.height;

            return {
                x: (clientX - rect.left) * scaleX,
                y: (clientY - rect.top) * scaleY
            };
        }

        function startDrag(e) {
            if (!userImage) return;
            isDragging = true;
            const coords = getCanvasCoordinates(e);
            dragStartX = coords.x - photoState.x;
            dragStartY = coords.y - photoState.y;
        }

        function doDrag(e) {
            if (!isDragging || !userImage) return;
            e.preventDefault();
            const coords = getCanvasCoordinates(e);
            photoState.x = coords.x - dragStartX;
            photoState.y = coords.y - dragStartY;
            render();
        }

        function stopDrag() {
            isDragging = false;
        }

        canvasWrapper.addEventListener('mousedown', startDrag);
        window.addEventListener('mousemove', doDrag);
        window.addEventListener('mouseup', stopDrag);

        canvasWrapper.addEventListener('touchstart', startDrag, { passive: false });
        window.addEventListener('touchmove', doDrag, { passive: false });
        window.addEventListener('touchend', stopDrag);

        // Unduh Hasil Gambar
        btnDownload.addEventListener('click', () => {
            if (!userImage) return;

            const link = document.createElement('a');
            link.download = 'twibbon-osis-skawan-2026.png';
            link.href = canvas.toDataURL('image/png', 1.0);
            link.click();
        });
    </script>
</body>
</html>