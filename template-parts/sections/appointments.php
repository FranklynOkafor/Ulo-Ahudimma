<form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="appointment-form">

    <input type="hidden" name="action" value="submit_appointment">
    <?php wp_nonce_field( 'submit_appointment_nonce', 'appointment_nonce' ); ?>


    <input type="text" name="patient_name" placeholder="Full Name" required>
    <input type="tel" name="patient_phone" placeholder="Phone Number" required>
    <input type="email" name="patient_email" placeholder="Email Address" required>

    <!-- Department -->
    <select name="appointment_department" id="appointment-department" required>
        <option value="">Select Department</option>
        <?php
        $departments = get_posts([
            'post_type'   => 'department',
            'numberposts' => -1
        ]);

        foreach ( $departments as $department ) {
            echo '<option value="' . esc_attr($department->ID) . '">' . esc_html($department->post_title) . '</option>';
        }
        ?>
    </select>

    <!-- Doctor (disabled until department is selected) -->
    <select name="appointment_doctor" id="appointment-doctor" disabled>
        <option value="">Select Doctor</option>
    </select>

    <input type="date" name="appointment_date" required>
    <input type="time" name="appointment_time" required>

    <textarea name="appointment_notes" placeholder="Additional notes (optional)"></textarea>

    <button type="submit" class="btn appointment-submit">Submit Appointment</button>

</form>
