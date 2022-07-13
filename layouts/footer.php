            <div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">THCS Long Biên</span>
							Application &copy; <?php echo date("Y") - 1 ?>-<?php echo date("Y") ?>
						</span>
						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<div class="overlay">
			<div class="overlay__inner">
				<div class="overlay__content"><span class="spinner"></span></div>
			</div>
		</div>

		<!--Form don vi tinh-->
		<div id="modal-change-year" class="modal fade" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog" style="width:30%">
				<div class="modal-content">
					<div class="modal-header no-padding">
						<div class="table-header">
							Thay đổi năm học
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<form id="fm-change-year" method="post">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="form-field-username">Năm học</label>
										<div>
											<select id="year_change_id" name="year_change_id" style="width:100%"
											class="form-control select2" data-placeholder="Lựa chọn năm học..."></select>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Đóng
						</button>
						<button class="btn btn-sm btn-primary pull-right" onclick="save_change_year()">
							<i class="ace-icon fa fa-save"></i>
							Ghi dữ liệu
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<!-- End formm don vi tinh-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='styles/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo URL ?>/styles/js/bootstrap.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery-ui.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.sparkline.index.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.resize.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.toast.js"></script>
		<script src="<?php echo URL ?>/styles/js/select2.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/chosen.jquery.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/moment.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/fullcalendar.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootbox.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/ace-elements.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/ace.min.js"></script>
	</body>
</html>
