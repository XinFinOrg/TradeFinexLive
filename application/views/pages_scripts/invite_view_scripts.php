<script type="text/javascript">
	
	$(function(){
		
		var handleDataTableButtons = function() {
			"use strict";
				0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
				dom: "Bfrtip",
				"bInfo" : false,
				buttons: [{
					extend: "copy",
					className: "btn-sm"
				}, {
					extend: "csv",
					className: "btn-sm"
				}, {
					extend: "excel",
					className: "btn-sm"
				}, {
					extend: "pdf",
					className: "btn-sm"
				}, {
					extend: "print",
					className: "btn-sm"
				}],
				bAutoWidth: true,
				"aoColumns": [
				  null, null, null, null, null, { "bSortable": false }
				],
				responsive: true
			})
		},
		TableManageButtons = function() {
			"use strict";
			return {
				init: function() {
					handleDataTableButtons()
				}
			}
		}();
		
		TableManageButtons.init();
		
	});
	
</script>	