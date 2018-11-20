<div class="question-field" style="margin: 2rem 0;">
    <?php wp_nonce_field( 'dr_question_nonce', 'dr_question' ) ?>
    <label style="font-size: 16px;font-weight: bold;">Question:</label>
    <textarea name="_dr_question_text" style="width: 100%; height: 100px;"><?php echo wp_kses_post( $question ); ?></textarea>
</div>