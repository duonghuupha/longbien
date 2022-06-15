<?php 
    $item = $this->jsonObj; $convert = new Convert();
    //$barcode = $convert->generateBarcode($data = array('sku'=> $item[0]['code']), 'teacher');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Trường THCS Long Biên - Quận Long Biên</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <script src="<?php echo URL ?>/styles/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo URL ?>/styles/js/html2canvas.js"></script>
    </head>
    <body class="no-skin">
        <div class="card">
            <div id="html-content-holder" style="background-color: #F0F0F1; color: #00cc65; width: 500px; margin:20px;
            padding:25px;">           
                <h2 style="color: #3e4b51;">
                    Html to canvas, and canvas to proper image
                </h2>
                <div style="float: left;width:110x;padding-left:10px" >
                    <img src="https://dummyimage.com/100x100/000/fff" style="width: 100px;height:100px;" />
                    
                </div>
                <div style="float: left;width:110x;padding-left:10px" >
                    <img  src="https://dummyimage.com/100x100/000/fff"
                    style="width: 100px;height:100px;" />
                </div>
            
                <p style="color: #3e4b51;">
                    <b>Codepedia.info</b> is a programming blog. Tutorials focused on Programming ASP.Net,
                    C#, jQuery, AngularJs, Gridview, MVC, Ajax, Javascript, XML, MS SQL-Server, NodeJs,
                    Web Design, Software
                </p>
           
            </div>
        </div>
        <script>
		    html2canvas(document.getElementById("html-content-holder"),
			{
				allowTaint: true,
				useCORS: true
			}).then(function (canvas) {
				var anchorTag = document.createElement("a");
				document.body.appendChild(anchorTag);
				//document.getElementById("previewImg").appendChild(canvas);
				anchorTag.save = "<?php echo DIR_UPLOAD.'/' ?>filename.jpg";
				anchorTag.href = canvas.toDataURL();
				//anchorTag.target = '_blank';
				anchorTag.click();
			});

    </script>
    </body>
</html>