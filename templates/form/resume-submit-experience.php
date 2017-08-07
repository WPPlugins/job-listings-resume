<?php
/**
 * Resume Detail Form: Experience
 *
 * This template can be overridden by copying it to yourtheme/job-listings/form/resume-submit-experience.php.
 *
 * HOWEVER, on occasion NooTheme will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author      NooTheme
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$experience        = array();
$enable_experience = jlt_get_resume_setting( 'enable_experience', '1' );
if ( $enable_experience ) {
	$experience[ 'employer' ] = jlt_json_decode( jlt_get_post_meta( $resume_id, '_experience_employer', '' ) );
	$experience[ 'job' ]      = jlt_json_decode( jlt_get_post_meta( $resume_id, '_experience_job', '' ) );
	$experience[ 'date' ]     = jlt_json_decode( jlt_get_post_meta( $resume_id, '_experience_date', '' ) );
	$experience[ 'note' ]     = jlt_json_decode( jlt_get_post_meta( $resume_id, '_experience_note', '' ) );
}

?>
<div class="resume-submit-detail resume-submit-experience">
	<fieldset class="fieldset">

		<label><?php _e( 'Work Experience', 'job-listings-resume' ); ?></label>

		<div class="field">

			<div class="field-clone-template jlt-hide" data-template="
			<div class='field-repeat'>
				<input type='text' class='jlt-form-control' placeholder='<?php _e( 'Employer', 'job-listings-resume' ); ?>'
				       name='_experience_employer[]'/>
				<input type='text' class='jlt-form-control' placeholder='<?php _e( 'Job Title', 'job-listings-resume' ); ?>'
				       name='_experience_job[]'/>
				<input type='text' class='jlt-form-control' placeholder='<?php _e( 'Start/end date', 'job-listings-resume' ); ?>'
				       name='_experience_date[]'/>
								<textarea class='jlt-form-control jlt-form-control-editor ignore-valid' id='_experience_note'
								          name='_experience_note[]' rows='5' placeholder='<?php _e( 'Note', 'job-listings-resume' ); ?>'></textarea>
				<div class='jlt-btn resume-detail-delete'><?php _e( 'Delete', 'job-listings-resume' ); ?></div>
			</div>
			">
			</div>

			<?php if ( ! empty( $experience[ 'employer' ][ 0 ] ) ) : ?>
				<?php foreach ( $experience[ 'employer' ] as $index => $employer ) : ?>

					<div class="field-repeat">
						<input type="text" class="jlt-form-control" placeholder="<?php _e( 'Employer', 'job-listings-resume' ); ?>"
						       name='_experience_employer[]'
						       value="<?php echo esc_attr( $experience[ 'employer' ][ $index ] ); ?>"/>
						<input type="text" class="jlt-form-control"
						       placeholder="<?php _e( 'Job Title', 'job-listings-resume' ); ?>"
						       name='_experience_job[]'
						       value="<?php echo esc_attr( $experience[ 'job' ][ $index ] ); ?>"/>
						<input type="text" class="jlt-form-control" placeholder="<?php _e( 'Start/end date', 'job-listings-resume' ); ?>"
						       name='_experience_date[]'
						       value="<?php echo esc_attr( $experience[ 'date' ][ $index ] ); ?>"/>
						<textarea class="jlt-form-control jlt-form-control-editor ignore-valid" id="_experience_note"
						          name="_experience_note[]" rows="5"
						          placeholder="<?php _e( 'Note', 'job-listings-resume' ); ?>"><?php echo html_entity_decode( $experience[ 'note' ][ $index ] ) ?></textarea>
						<div class="jlt-btn resume-detail-delete"><?php _e( 'Delete', 'job-listings-resume' ); ?></div>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>

		</div>

		<div class="jlt-btn resume-detail-add"><i class="jlt-icon jltfa-plus"></i> <?php _e( 'Add new field', 'job-listings-resume' ); ?>
		</div>

	</fieldset>
</div>
