<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
    <?php
                $query = "select * from tbl_footer where id='1' ";
                $footernote = $db->select($query);
                if($footernote){
                    while($result= $footernote->fetch_assoc()){
?> 
	  <p> &copy; <?php echo $result['note']; ?> <?php echo date('Y'); ?></p>
	  <?php } } ?>
    </div>
</body>
</html>