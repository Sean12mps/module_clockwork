<?php 
// 	Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * 	Output the interface form
 *
 * @access 	public
 * @param 	bool $enqueue
 * @param 	array $args
 * @return 	form_set
 */
function get_clockwork_form( $enqueue = false, $args = array( 'hook_slug'=>'', 'hook_action'=>'', 'hook_name'=>'', 'hook_temp'=>'', 'hook_prio'=>'', 'hook_indx'=>'' ) ){

	$hook_slug 		= ( $enqueue ? '#' : $args['hook_slug'] );
	$hook_action 	= ( $enqueue ? '%' : $args['hook_action'] );
	$hook_name 		= ( $enqueue ? '%' : $args['hook_name'] );
	$hook_temp 		= ( $enqueue ? '%' : $args['hook_temp'] );
	$hook_prio 		= ( $enqueue ? '%' : $args['hook_prio'] );
	$hook_indx 		= ( $enqueue ? '%' : $args['hook_indx'] );

	$form_set = '	<br>

					<div class="clockwork-hook form-wrapper row">
						
						<div class="col-md-10 col-md-offset-2">

							<div class="form-header col-md-12">

								<div class="col-md-4">
									
									<label>Loop Slug</label><br>
									<input type="text" class="hook_slug" name="hook_slug[]" value="'. $hook_slug .'">
									<input type="hidden" class="hook_index" name="hook_indx['. $hook_slug .']" value="'. $hook_indx .'">
								</div>

								<div class="col-md-4">
									
									<label>Loop Action</label><br>
									<select class="hook_action" name="hook_action['. $hook_slug .']">

										<option value="add" 	'. ( $hook_action == 'add' 		? 'selected' : '' ) .'	>Add Action</option>
										<option value="remove" 	'. ( $hook_action == 'remove' 	? 'selected' : '' ) .'	>Remove Action</option>
									</select>
								</div>

								<div class="col-md-4">
									
									<label class="col-md-12 text-center">Form Action</label><br>
									<i class="glyphicon glyphicon-remove col-md-4 btn-hook_remove"></i>
									<i class="glyphicon glyphicon-plus col-md-4 btn-hook_addnext"></i>
									<i class="glyphicon glyphicon-move col-md-4 btn-hook_drag"></i>
								</div>
							</div>
							
							<div class="form-content col-md-12">
								
								<div class="col-md-4">

									<label>Hook Name</label><br>
									<input type="text" 	class="hook_name" 	name="hook_name['. $hook_slug .']" 		value="'. $hook_name .'">
								</div>

								<div class="col-md-4">

									<label>Function Name</label><br>
									<input type="text" 	class="hook_temp" 	name="hook_temp['. $hook_slug .']" 		value="'. $hook_temp .'">
								</div>

								<div class="col-md-4">

									<label>Hook Priority</label><br>
									<input type="number" class="hook_prio" 	name="hook_prio['. $hook_slug .']" 		value="'. $hook_prio .'">
								</div>
							</div>
						</div>
					</div>';

	return $form_set;
}