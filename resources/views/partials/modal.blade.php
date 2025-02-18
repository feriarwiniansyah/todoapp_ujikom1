<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content"> {{-- digunakan unutk mengarahkan ke validasi store di tasklistscontroller--}}
            @method('POST') {{-- digunakan untuk mengarahkan ke validasi store di tasklistscontroller--}}
            @csrf {{-- CSRF token adalah cara yang bisa dilakukan oleh pihak website untuk memastikan permintaan yang dilakukan berasal dari pengguna --}}
            <div class="modal-header" style="background-color: #0B2D64">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> {{-- digunakan untuk menutup modal--}}
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list"> {{--Bagian ini menampilkan form untuk menambahkan list--}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button> {{--Bagian ini menampilkan tombol untuk menambahkan list--}}
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content"> {{-- digunakan unutk mengarahkan ke validasi store di taskcontroller--}}
            @method('POST') {{-- digunakan untuk mengarahkan ke validasi store di taskcontroller--}}
            @csrf {{-- CSRF token adalah cara yang bisa dilakukan oleh pihak website untuk memastikan permintaan yang dilakukan berasal dari pengguna --}}
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> {{-- digunakan untuk menutup modal --}}
            </div>
            <div class="modal-body">
                <input type="text" id="taskListId" name="list_id" hidden> {{--Bagian ini menampilkan form untuk menambahkan task--}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama :</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama kegiatan😊"> {{--Bagian ini menampilkan form untuk menambahkan task--}}
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi :</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="Apakah deskripsi kegiatan anda??🤔"> {{--Bagian ini menampilkan form untuk menambahkan task--}}
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority :</label>
                    <select class="form-control" name="priority" id="taskListId" name="list_id" required>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="low">Low</option>
                    </select> {{--Bagian ini menampilkan form untuk menambahkan task--}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div> {{--Bagian ini menampilkan tombol untuk menambahkan task--}}
        </form>
    </div>
</div>