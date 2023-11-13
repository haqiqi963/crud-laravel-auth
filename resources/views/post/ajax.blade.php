<script type="text/javascript">
    $(function () {

        $("#add_post_form").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $("#add_post_btn").text('Menambahkan...');
            $.ajax({
                url: "{{ route('store') }}",
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if(response.status == 200) {
                        Swal.fire(
                            'Menambahkan!',
                            'Post Berhasil Ditambahkan!',
                            'success'
                        )
                        fetchAllPosts();
                    }
                    $("#add_post_btn").text('Tambahkan Post');
                    $("#add_post_form")[0].reset();
                    $("#addPostModal").modal('hide');
                }
            });
        });

        <!-- Edit -->
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('edit') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#title").val(response.title);
                    $("#content").val(response.content);
                    $("#image").html(
                        `<img src="storage/image/${response.image}" width="50">`);
                    $("#post_id").val(response.id);
                    $("#post_img").val(response.image);
                }
            });
        });

        //Update

        $("#edit_post_form").submit(function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            $("#edit_post_btn").text('Mengubah...');

            $.ajax({
                url: '{{ route('update') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    if(response.status == 200) {
                        Swal.fire(
                            'Terubah!',
                            'Post Berhasil Diubah!',
                            'success'
                        )
                        fetchAllPosts();
                    }
                    $("#edit_post_btn").text('Update Post');
                    $("#edit_post_form")[0].reset();
                    $("#editPostModal").modal('hide');
                }
            });
        });

        //Delete
        $(document).on('click', '.deleteData', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Apakah anda Yakin?',
                text: "Anda tidak bisa mengembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url: '{{ route('delete') }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response){
                            console.log(response);
                            Swal.fire(
                                'Terhapus!',
                                'Data post telah terhapus!',
                                'success'
                            )
                            fetchAllPosts();
                        }
                    });
                }
            })
        });



        fetchAllPosts();
        function fetchAllPosts() {
            $.ajax({
                url: "{{ route('fetchAll') }}",
                method: 'GET',
                success: function (response){
                    $("#show_all_post").html(response);
                    $("table").DataTable({
                        order: ['0', 'asc']
                    });
                }
            });
        }

    });
</script>
