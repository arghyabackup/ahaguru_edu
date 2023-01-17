<?php if($mode == 'add'){ ?>
<tr class="row_<?php echo $id;?> post" data-id="<?php echo $id;?>">
<td><?php echo $return['name']; ?></td>
<td><?php echo $return['email'];?></td>
<td><?php echo $return['mobile'];?></td>
<td><?php echo $return['class'];?></td>
<td> 
<a href="javascript:void(0)" class="btn btn-info edit" data-id="<?php echo $id;?>">Edit</a>
<a href="javascript:void(0)" onclick="delete_data(<?=$id; ?>,'id','students');" class="btn btn-danger delete" data-id="<?php echo $id;?>">Delete</a>
</td>
</tr>
<?php }else{ ?>
<td><?php echo $return['name'];?></td>
<td><?php echo $return['email'];?></td>
<td><?php echo $return['mobile'];?></td>
<td><?php echo $return['class'];?></td>
<td> 
<a href="javascript:void(0)" class="btn btn-info edit" data-id="<?php echo $id;?>">Edit</a>
<a href="javascript:void(0)" onclick="delete_data(<?=$id; ?>,'id','students');" class="btn btn-danger delete" data-id="<?php echo $id;?>">Delete</a>
</td>	
<?php } ?>