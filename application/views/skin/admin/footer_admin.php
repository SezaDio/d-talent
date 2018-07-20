	<!-- script tags ============================================================= -->
        
        <!-- Sparkline -->
        <script src="<?php echo base_url('asset/js/sparkline/jquery.sparkline.min.js?ver=b1.0'); ?>" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('asset/js/app.js?ver=b1.0'); ?>" type="text/javascript"></script>
        
        <!-- datepicker -->
        <script src="<?php echo base_url('asset/js/datepicker/bootstrap-datepicker.js?ver=b1.0'); ?>" type="text/javascript"></script>
       
        <!-- DataTables --> 
        <script src="<?php echo base_url('asset/js/jquery.dataTables.js?ver=b1.0'); ?>" type="text/javascript"></script>
        <script>
            $(document).ready( function () {
                $('#dataTables-list').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });

                $('#dataTables-list-faq').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":3}
                    ]
                });
                
                $('#eventgratis').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('#eventbayar').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('#dataTables-list-rekomendasi').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('#dataTables-list-komunitas').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('#dataTables-list-comming').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('#dataTables-list-youth').DataTable({
                    "columnDefs":[
                        {"orderable":false, "targets":4}
                    ]
                });
                $('.dataTable').DataTable();
                
                CKEDITOR.replace('editor_wow');
                $(".textarea").wysihtml5();

                // Script untuk onchange ganti gambar
                $(".ganti_gambar").hide();
                $("#ganti").click(function(){
                    $(".ganti_gambar").toggle();
                });
            } );
        </script>

        <!-- Ajax -->
        <script src="<?php echo base_url('asset/js/ajax.js?ver=b1.0'); ?>" type="text/javascript"></script>

        <!-- CK Editor -->
        <script src="<?php echo base_url('asset/js/ckeditor.js?ver=b1.0'); ?>" type="text/javascript"></script>

        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url('asset/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js?ver=b1.0'); ?>" type="text/javascript"></script>

        <!-- Morris.js charts -->
        <script src="<?php echo base_url('asset/js/morris/morris.min.js?ver=b1.0'); ?>" type="text/javascript"></script>

	</body>
</html>