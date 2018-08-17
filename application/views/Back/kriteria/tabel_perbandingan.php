
<h2>Prioritas Kriteria</h2>
<div>
	<?php 
		echo validation_errors(); 
		$i = 0;
		foreach($result_kriteria as $row)
		{
			$id_kriteria[$i] = $row->id;  
			$i++;
		}
	?>
	<?php echo form_open('Kriteria/process_kriteria', '',$id_kriteria);?>						
	<table id="data-kriteria" class="uk-table uk-table-divider uk-table-striped" cellspacing="0">
    <thead>
    	<tr>
			<th></th>
			<?php foreach($result_kriteria as $row) {?>
				<th><?php echo $row->nama_kriteria;?></th>
			<?}?>       	
        </tr>
    </thead>
    <tbody>
        <?php	
			//for($i=0;$i<$jumlah_kriteria;$i++)
			$i=0;
			$l = 0;
			$m = $jumlah_kriteria;
			$b=0;
			foreach($result_kriteria as $row)
			{
        
				echo '<tr>';
				echo '<td>';
				echo $row->nama_kriteria;
				echo '</td>';
				
				for($k=0;$k<$l;$k++){
					echo '<td> - </td>';
				}
				for($j=0;$j<$m;$j++) {
					if($j==0){
						echo '<td>';
						echo '1';
						echo '</td>';
						
					}else{							
						$bobot_dipilih = 0; if(set_value('bobot'.$b)!=0) $bobot_dipilih = set_value('bobot'.$b);
						echo '<td>';
						echo form_dropdown('bobot'.$b, $bobot, '', 'size="0"');
						echo '</td>';
						$b++;
					}
				}
				$l++;
				$m--;
				echo '</tr>';
				$i++;
			} ?>
			<input type="hidden" name="max_bobot" value="<?php echo $b;?>" />             	
    </tbody>
</table>
	<button class="uk-button uk-button-default">Submit</button>
	<?php echo form_close();?>
</div>
