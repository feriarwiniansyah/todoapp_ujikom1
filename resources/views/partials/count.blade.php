<div class="text-center gap-3" >
    <div class="p-3">
        {{-- <h6 class="text-dark fs-5">Jumlah :</h6> --}}
        <div class="d-flex gap-2 justify-content-between text-white align-items-center px-2">
            <div class="d-flex flex-column align-items-center px-3 py-2 rounded-4 shadow-lg" style="background-color: #5A4DD8; width: 150px; height: 130px">
                <i class="bi bi-card-list fs-4 p-1 text-white rounded mb-1"></i> 
                <h6 class="mt-1 mb-0 fs-6">Jumlah Task :</h6>
                <p class="mb-0 fw-bold fs-5">{{ $lists->count() }}</p>
            </div>
            <div class="d-flex flex-column align-items-center px-3 py-2 rounded-4 shadow-lg" style="background-color: #0CB3E6; width: 150px; height: 130px">
                <i class="bi bi-star fs-4 p-1 text-white rounded mb-1"></i> 
                <h6 class="mt-1 mb-0 fs-6">Tugas Low :</h6>
                <p class="mb-0 fw-bold fs-5">{{ $lowPriorityCount }}</p>
            </div>
            <div class="d-flex flex-column align-items-center px-3 py-2 rounded-4 shadow-lg" style="background-color: #E05585; width: 150px; height: 130px">
                <i class="bi bi-star-half fs-4 p-1 text-white rounded mb-1"></i> 
                <h6 class="mt-1 mb-0 fs-6">Tugas Medium :</h6>
                <p class="mb-0 fw-bold fs-5">{{ $mediumPriorityCount }}</p>
            </div>
            <div class="d-flex flex-column align-items-center px-3 py-2 rounded-4 shadow-lg" style="background-color: #4A6EDD; width: 150px; height: 130px">
                <i class="bi bi-star-fill fs-4 p-1 text-white rounded mb-1"></i> 
                <h6 class="mt-1 mb-0 fs-6">Tugas High :</h6>
                <p class="mb-0 fw-bold fs-5">{{ $highPriorityCount }}</p>
            </div>
            <div class="d-flex flex-column align-items-center px-3 py-2 rounded-4 shadow-lg" style="background-color: #E3651D; width: 145px; height: 130px">
                <i class="bi bi-card-list fs-4 p-1 text-white rounded mb-1"></i> 
                <h6 class="mt-1 mb-0 fs-6">Belum selesai :</h6>
                <p class="mb-0 fw-bold fs-5">{{ $uncompletedCount }}</p>
            </div>
        </div>
    </div>
</div>
</div>