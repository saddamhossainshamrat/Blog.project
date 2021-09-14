<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>

				<?php
				if(isset($_GET['deluser'])) {
					$delid = $_GET['deluser'];
					$delquery = "delete from tbl_user where id='$delid'";
					$deldata = $db->delete($delquery);
					if($deldata){
						echo "<span class='success'>Deleted Successfully!</span>";
					}else{
						echo "<span class='error'>Data Not Deleted !</span>";
					}
				}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = "select * from tbl_user order by id desc";
					$alluser =$db->select($query);
					if($alluser){
						$i=0;
						while($result = $alluser->fetch_assoc()){
							$i++;

					?>	
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['email_at']; ?></td>
							<td><?php echo $fm->textShorten($result['details_at'], 30); ?></td>
							<td>
                            <?php 
                            if ($result['role_at'] == '0') {
                                echo "Admin";
                            }elseif ($result['role_at'] == '1'){
                            echo "Author";
                            }elseif($result['role_at'] == '2'){
                                echo "Editor";
                            }
                              ?>
                            
                            </td>
							
							<td><a href="viewuser.php?userid=<?php echo $result['id']; ?>">View</a> 
							<?php
                if(Session::get('userRole') == '0') { ?>
                   || <a onclick="return confirm('Are you sure to Delete!');" href="?deluser=<?php echo $result['id']; ?>">Delete</a>
						

             <?php   } ?>
			 </td>
			 </tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <?php include 'inc/footer.php'; ?>

<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>