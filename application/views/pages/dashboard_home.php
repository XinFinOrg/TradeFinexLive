<div class="dash_wraper">
    <?php
    if ((empty($check_company) && is_array($check_company) && sizeof($check_company) == 0) || $check_company[0]->tfcom_cat_ref == 0 || $check_company[0]->tfcom_country_ref == 0) {

        redirect(base_url() . 'user/edit');

    } else {

        if ($user_type_ref == 1 || $user_type_ref == 2) { ?>

            <div class="sub_page_wraper">
                <section class="supplier_financier_dashboard">
                    <div class="container">
                        <div class="common_dashboard_sec supp_finan_my_projects">
                            <div class="dsahboard_header_sec">
                                <div class="col-md-3">
                                    <h2>My Projects</h2>
                                </div>
                                <a class="dash_browse_btn" href="<?= base_url() ?>listing/details"> Browse Project</a>
                            </div>
                            <div class="dynamic_table">
                                <table id="accepted_listing_projects" class="table table-striped table-bordered"
                                       width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="width:11%;">Project No</th>
                                        <th style="width:16%;">Project Title</th>
                                        <th style="width:16%;">Company</th>
                                        <th style="width:12%;">Country</th>
                                        <th class="text-center" style="width:8%;">Featured</th>
                                        <th class="text-center" style="width:12%;">Timeline</th>
                                        <th class="text-center" style="width:12%;">Status</th>
                                        <th class="text-center" style="width:13%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    $pcount = 0;

                                    if ($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0 && (!empty($proposal_accepted) || !empty($proposal_submitted) || !empty($proposals_subcontractor))) {

                                        foreach ($projects_listed as $plrow) {

                                            $tpfawardStatus = 0;
                                            $tppawardStatus = 0;
                                            $tpfeditMode = 0;
                                            $special_request = '';

                                            if (isset($proposal_details_financier[$plrow->ID]) ) {
                                                $tpfawardStatus = $financier_project_proposals[$plrow->ID][0]->tpf_beneficiary_accept;


                                                $tpfeditMode = $proposal_details_financier[$plrow->ID][0]->tpf_beneficiary_edit_mode;
                                                $special_request = $proposal_details_financier[$plrow->ID][0]->tpf_beneficiary_request_message;
                                            }

                                            $edit_mode = 0;
                                            $edit_request = '';

                                            if (isset($supplier_project_proposals[$plrow->ID]) && !empty($supplier_project_proposals[$plrow->ID])) {
                                                $edit_mode = $supplier_project_proposals[$plrow->ID][0]->tpp_beneficiary_edit_mode;
                                                $special_request = $edit_request = $supplier_project_proposals[$plrow->ID][0]->tpp_beneficiary_request_message;
                                                $tppawardStatus = $supplier_project_proposals[$plrow->ID][0]->tpp_rejected;
                                            }

                                            if (isset($financier_project_proposals[$plrow->ID]) && !empty($financier_project_proposals[$plrow->ID])) {
                                                $edit_mode = $financier_project_proposals[$plrow->ID][0]->tpf_beneficiary_edit_mode;
                                                $special_request = $edit_request = $financier_project_proposals[$plrow->ID][0]->tpf_beneficiary_request_message;
                                            }

                                            if ((!empty($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0 && in_array($plrow->ID, $proposals_subcontractor)) || (!empty($proposal_accepted) && sizeof($proposal_accepted) <> 0 && in_array($plrow->ID, $proposal_accepted)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted))) {
                                                ?>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" puser="<?= $plrow->userID; ?>"
                                                           row_id="<?= $plrow->ID; ?>" <?= (($user_id <> 0) ? 'class="proj_info more_info"' : ''); ?>><?= 'TF-' . strtotime($plrow->postDate); ?></a>
                                                    </td>
                                                    <td>
                                                        <?php

                                                        if (strlen($plrow->title) <= 30) {

                                                            echo ucfirst($plrow->title);

                                                        } else {
                                                            echo ucfirst(substr($plrow->title, 0, 30)) . '<a href="javascript:void(0)" puser="' . $plrow->userID . '" row_id="' . $plrow->ID . '" ' . (($user_id <> 0) ? "class='more_info'" : "") . '>.. more<div class="descrip">' . ucfirst($plrow->title) . '</div></a>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= ucwords($plrow->tfcom_name); ?>
                                                    </td>
                                                    <td>
                                                        <?= ucwords($plrow->tfc_name); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= ($plrow->featured ? '<span class="label label-featured"><i class="fa fa-check"></i></span>' : '<span class="label label-not-featured"><i class="fa fa-times"></i></span>'); ?>
                                                    </td>
                                                    <td class="timeline_text">
                                                        <?php
                                                        if ($plrow->awardStatus == 2 || $plrow->awarded_provider == 2) {
                                                            echo '(S) - ' . date('d M, Y', strtotime($plrow->pstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->pcompletedDate));
                                                        } else if ($plrow->awardStatus == 2 || $plrow->awarded_financier == 2) {
                                                            echo '(S) - ' . date('d M, Y', strtotime($plrow->fstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->fcompletedDate));
                                                        } else {
                                                            echo '(P) - ' . date('d M, Y', strtotime($plrow->updatingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->closingDate));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php

                                                        if ((($user_type_ref == 1 && $plrow->provider_completion_request == 2) || ($user_type_ref == 2 && $tpfawardStatus == 3) || $plrow->awardStatus == 2) && $plrow->row_deleted == 0) {
                                                            echo '<span class="label pclose pcompleted positionauto">COMPLETED</span>';
                                                        } else if (($user_type_ref == 2 && $tpfawardStatus == 2) && $plrow->row_deleted == 0) {
                                                            echo '<span class="label pclose positionauto">NOT INITIATED</span>';
                                                        }else if (($user_type_ref == 1 && $tppawardStatus == 1) && $plrow->row_deleted == 0) {
                                                            echo '<span class="label pclose positionauto">NOT INITIATED</span>';
                                                        }
                                                        else if ((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && $tpfawardStatus == 1) && $plrow->row_deleted == 0) {
                                                            echo '<div class="label pawarded pinprogress positionauto">IN-PROGRESS</div>';
                                                        } else if (($user_type_ref == 1 || $user_type_ref == 2) && (trim($edit_request) <> '' || trim($special_request) <> '') && ($edit_mode == 1 || $tpfeditMode == 1)) {
                                                            echo '<div class="label pawarded pinprogress positionauto">Special Request <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="descrip descripr">' . ucfirst($special_request) . '</div></a></div>';
                                                        } else if ((($user_type_ref == 1 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && in_array($plrow->ID, $proposal_accepted)) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0) {
                                                            echo '<span class="label psfawarded positionauto">AWARDED</span>';
                                                        } else if (in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)) {
                                                            echo '<span class="label pawarded positionauto">PROPOSAL SUBMITTED</span>';
                                                        } else if ($plrow->awardStatus == 0 && $plrow->row_deleted == 0) {
                                                            echo '<span class="label popen positionauto">OPEN</span>';
                                                        } else {
                                                            echo '<span class="label pclose pexpiry positionauto">EXPIRED</span>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php

                                                        if (($user_type_ref == 1 && $plrow->provider_completion_request == 2) || ($user_type_ref == 2 && ($plrow->financier_completion_request == 2 || $tpfawardStatus == 3))) {
                                                            echo '<span class="rating_b">RATE BENEFICIARY</span>' . ((isset($project_user_rating[$plrow->ID]) && $project_user_rating[$plrow->ID] > 0) ? set_rating_user($project_user_rating[$plrow->ID]) : '<div id="benifr-' . $plrow->ID . '" class="star beneficiary_rating" data-rating="' . (isset($project_user_rating[$plrow->ID]) ? $project_user_rating[$plrow->ID] : 0) . '" from_user_id="' . $user_id . '" from_user_type="' . $user_type_ref . '" to_user_id="' . $plrow->userID . '" to_user_type="' . $plrow->userType . '" prow_id="' . $plrow->ID . '" data-toggle="confirmation" data-title="Are You want to do this?"></div>');
                                                        } else {

                                                            if (in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)) {
                                                                ?>
                                                                <a class="proj_info view_propose_btn tooltipa"
                                                                   user_type_ref="<?= $user_type_ref; ?>"
                                                                   user_id="<?= $user_id; ?>"
                                                                   row_id="<?= $plrow->ID; ?>"><i class="fa fa-eye"></i>
                                                                    <span class="tooltipatext">View Proposal</span></a>&nbsp;
                                                                <a class="send_message tooltipa send_message_btn"
                                                                   proj_id="<?= $plrow->ID; ?>"
                                                                   send_user="<?= ((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? $supplier_info[$plrow->ID][0] : $plrow->userID); ?>"
                                                                   send_user_type="<?= ((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? 1 : $plrow->userType); ?>"><span><i
                                                                                class="fa fa-comments"></i></span> <span
                                                                            class="tooltipatext">Send Message</span></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a class="view_propose view_propose_btn tooltipa"
                                                                   user_type_ref="<?= $user_type_ref; ?>"
                                                                   user_id="<?= $user_id; ?>"
                                                                   row_id="<?= $plrow->ID; ?>"
                                                                   prow_id="<?= (isset($proposal_info[$plrow->ID][0]) ? $proposal_info[$plrow->ID][0] : 0); ?>"><i
                                                                            class="fa fa-eye"></i> <span
                                                                            class="tooltipatext">View Proposal</span></a>&nbsp;
                                                                <a class="send_message send_message_btn tooltipa"
                                                                   proj_id="<?= $plrow->ID; ?>"
                                                                   send_user="<?= ((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? $supplier_info[$plrow->ID][0] : $plrow->userID); ?>"
                                                                   send_user_type="<?= ((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? 1 : $plrow->userType); ?>"
                                                                   style=""><span><i class="fa fa-comments"></i></span>
                                                                    <span class="tooltipatext">Send Message</span></a>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                            $pcount++;
                                        }
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="common_dashboard_sec supp_finan_my_invitations">
                            <div class="dsahboard_header_sec">
                                <div class="col-md-3">
                                    <h2>My Invitations</h2>
                                </div>
                                <a class="dash_browse_btn" href="<?= base_url() ?>listing/details"> Browse Project</a>
                            </div>
                            <div class="dynamic_table">
                                <table id="invited_listing_projects" class="table table-striped table-bordered"
                                       width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="width:11%;">Project No</th>
                                        <th style="width:16%;">Project Title</th>
                                        <th style="width:16%;">Company</th>
                                        <th style="width:12%;">Country</th>
                                        <th class="text-center" style="width:8%;">Featured</th>
                                        <th class="text-center" style="width:12%;">Timeline</th>
                                        <th class="text-center" style="width:12%;">Status</th>
                                        <th class="text-center" style="width:13%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $icount = 0;
                                    $count = 1;

                                    if (!empty($all_invitation) && sizeof($all_invitation) <> 0) {
                                        foreach ($all_invitation as $ai_row) {

                                            if ((!empty($proposal_submitted) && in_array($ai_row->ID, $proposal_submitted) && !in_array($ai_row->ID, $proposal_accepted)) || (!empty($proposal_accepted) && sizeof($proposal_accepted) <> 0 && in_array($ai_row->ID, $proposal_accepted))) {

                                            } else {

                                                if (($user_type_ref == 1 && $ai_row->awarded_provider == 1) || ($user_type_ref == 2 && $ai_row->awarded_financier == 1) || $ai_row->awardStatus == 1) {

                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" puser="<?= $ai_row->userID; ?>"
                                                               row_id="<?= $ai_row->ID; ?>" <?= (($user_id <> 0) ? 'class="proj_info more_info"' : ''); ?>><?= 'TF-' . strtotime($ai_row->postDate); ?></a>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            if (strlen($ai_row->title) <= 30) {

                                                                echo ucfirst($ai_row->title);

                                                            } else {
                                                                echo ucfirst(substr($ai_row->title, 0, 30)) . '<a href="javascript:void(0)" puser="' . $ai_row->userID . '" row_id="' . $ai_row->ID . '" ' . (($user_id <> 0) ? "class='more_info'" : "") . '>.. more<div class="descrip">' . ucfirst($ai_row->title) . '</div></a>';
                                                            }

                                                            ?>
                                                        </td>
                                                        <td><?= ucwords($ai_row->tfcom_name); ?></td>
                                                        <td><?= ucwords($ai_row->tfc_name); ?></td>
                                                        <td class="text-center">
                                                            <?= ($ai_row->featured ? '<span class="label label-featured"><i class="fa fa-check"></i></span>' : '<span class="label label-not-featured"><i class="fa fa-times"></i></span>'); ?>
                                                        </td>
                                                        <td class="timeline_text">
                                                            <?php
                                                            if ($ai_row->awardStatus == 2 || $ai_row->awarded_provider == 2) {
                                                                echo '(S) - ' . date('d M, Y', strtotime($ai_row->pstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($ai_row->pcompletedDate));
                                                            } else if ($ai_row->awardStatus == 2 || $ai_row->awarded_financier == 2) {
                                                                echo '(S) - ' . date('d M, Y', strtotime($ai_row->fstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($ai_row->fcompletedDate));
                                                            } else {
                                                                echo '(P) - ' . date('d M, Y', strtotime($ai_row->updatingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($ai_row->closingDate));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php

                                                            if ($ai_row->awardStatus == 0 && $ai_row->row_deleted == 0) {
                                                                echo '<span class="label popen positionauto">OPEN</span>';
                                                            } else {
                                                                echo '<span class="label pclose pexpiry positionauto">EXPIRED</span>';
                                                            }

                                                            ?>
                                                        </td>
                                                        <td class="text-center inv_action"><?= ((!empty($invitation_accept) && sizeof($invitation_accept) <> 0 && in_array($ai_row->ID, $invitation_accept)) ? '<a class="proj_info view_propose_btn tooltipa" user_type_ref="' . $user_type_ref . '" user_id="' . $user_id . '" row_id="' . $ai_row->ID . '"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="send_message tooltipa send_message_btn" proj_id="' . $ai_row->ID . '" send_user="' . $ai_row->userID . '" send_user_type="' . $ai_row->userType . '"><span><i class="fa fa-comments"></i></span> <span class="tooltipatext">Send Message</span></a>' : '<a class="binvite proj_info view_propose_btn tooltipa" puser="' . $user_id . '" user_id="' . $ai_row->tfb_user_ref . '" row_id="' . $ai_row->ID . '" user_type="' . $user_type_ref . '"><i class="fa fa-upload"></i> <span class="tooltipatext">Submit Proposal</span></a>&nbsp;<a class="send_message send_message_btn tooltipa" proj_id="' . $ai_row->ID . '" send_user="' . $ai_row->userID . '" send_user_type="' . $ai_row->userType . '" style=""><span><i class="fa fa-comments"></i></span> <span class="tooltipatext">Send Message</span></a>'); ?></td>
                                                    </tr>
                                                    <?php
                                                    $icount++;
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="common_dashboard_sec supp_finan_my_saved_projects">
                            <div class="dsahboard_header_sec">
                                <div class="col-md-3">
                                    <h2>My Saved Projects</h2>
                                </div>
                                <a class="dash_browse_btn" href="<?= base_url() ?>listing/details"> Browse Project</a>
                            </div>
                            <div class="dynamic_table">
                                <table id="saved_listing_projects" class="table table-striped table-bordered"
                                       width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="width:11%;">Project No</th>
                                        <th style="width:16%;">Project Title</th>
                                        <th style="width:16%;">Company</th>
                                        <th style="width:12%;">Country</th>
                                        <th class="text-center" style="width:8%;">Featured</th>
                                        <th class="text-center" style="width:12%;">Timeline</th>
                                        <th class="text-center" style="width:12%;">Status</th>
                                        <th class="text-center" style="width:13%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    if ($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0 && !empty($saved_project)) {

                                        foreach ($projects_listed as $plrow) {

                                            if (!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($plrow->ID, $saved_project)) {

                                                if ((!empty($proposal_submitted) && in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)) || (!empty($proposal_accepted) && sizeof($proposal_accepted) <> 0 && in_array($plrow->ID, $proposal_accepted))) {

                                                } else {

                                                    if (($user_type_ref == 1 && $plrow->awarded_provider == 1) || ($user_type_ref == 2 && $plrow->awarded_financier == 1) || $plrow->awardStatus == 1) {

                                                    } else {

                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                   puser="<?= $plrow->userID; ?>"
                                                                   row_id="<?= $plrow->ID; ?>" <?= (($user_id <> 0) ? 'class="proj_info more_info"' : ''); ?>><?= 'TF-' . strtotime($plrow->postDate); ?></a>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                if (strlen($plrow->title) <= 30) {

                                                                    echo ucfirst($plrow->title);

                                                                } else {
                                                                    echo ucfirst(substr($plrow->title, 0, 30)) . '<a href="javascript:void(0)" puser="' . $plrow->userID . '" row_id="' . $plrow->ID . '" ' . (($user_id <> 0) ? "class='proj_info more_info'" : "") . '>.. more<div class="descrip">' . ucfirst($plrow->title) . '</div></a>';
                                                                }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?= ucwords($plrow->tfcom_name); ?>
                                                            </td>
                                                            <td>
                                                                <?= ucwords($plrow->tfc_name); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?= ($plrow->featured ? '<span class="label label-featured"><i class="fa fa-check"></i></span>' : '<span class="label label-not-featured"><i class="fa fa-times"></i></span>'); ?>
                                                            </td>
                                                            <td class="timeline_text">
                                                                <?php
                                                                if ($plrow->awardStatus == 2 || $plrow->awarded_provider == 2) {
                                                                    echo '(S) - ' . date('d M, Y', strtotime($plrow->pstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->pcompletedDate));
                                                                } else if ($plrow->awardStatus == 2 || $plrow->awarded_financier == 2) {
                                                                    echo '(S) - ' . date('d M, Y', strtotime($plrow->fstartingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->fcompletedDate));
                                                                } else {
                                                                    echo '(P) - ' . date('d M, Y', strtotime($plrow->updatingDate)) . '<hr/>(C)- ' . date('d M, Y', strtotime($plrow->closingDate));
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php

                                                                if ((($user_type_ref == 1 && $plrow->provider_completion_request == 2) || ($user_type_ref == 2 && $tpfawardStatus == 3) || $plrow->awardStatus == 2) && $plrow->row_deleted == 0) {
                                                                    echo '<span class="label pclose pcompleted positionauto">COMPLETED</span>';
                                                                } else if (($user_type_ref == 2 && $tpfawardStatus == 2) && $plrow->row_deleted == 0) {
                                                                    echo '<span class="label pclose positionauto">NOT INITIATED</span>';
                                                                } else if ((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && $tpfawardStatus == 1) && $plrow->row_deleted == 0) {
                                                                    echo '<div class="label pinprogress positionauto">IN-PROGRESS</div>';
                                                                } else if ($user_type_ref == 2 && trim($special_request) <> '' && $tpfeditMode == 1) {
                                                                    echo '<div class="label pinprogress positionauto">Special Request <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="descrip descripr">' . ucfirst($special_request) . '</div></a></div>';
                                                                } else if ((($user_type_ref == 1 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && in_array($plrow->ID, $proposal_accepted)) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0) {
                                                                    echo '<span class="label psfawarded positionauto">AWARDED</span>';
                                                                } else if (in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)) {
                                                                    echo '<span class="label pawarded positionauto">PROPOSAL SUBMITTED</span>';
                                                                } else if ($plrow->awardStatus == 0 && $plrow->row_deleted == 0) {
                                                                    echo '<span class="label popen positionauto">OPEN</span>';
                                                                } else {
                                                                    echo '<span class="label pclose pexpiry positionauto">EXPIRED</span>';
                                                                }

                                                                ?>
                                                            </td>
                                                            <td class="text-center sp_action">
                                                                <?= (((!empty($invitation_accept) && sizeof($invitation_accept) <> 0 && in_array($plrow->ID, $invitation_accept)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted))) ? '<a class="binvite proj_info view_propose_btn tooltipa" user_id="' . $plrow->tfb_user_ref . '" puser="' . $user_id . '" row_id="' . $plrow->ID . '"><i class="fa fa-eye"></i><span class="tooltipatext">View project</span></a>&nbsp;<a class="send_message send_message_btn tooltipa" proj_id="' . $plrow->ID . '" send_user="' . $plrow->userID . '" send_user_type="' . $plrow->userType . '"><i class="fa fa-comments"></i><span class="tooltipatext">Send Message</span> </a>' : '<a class="binvite proj_info view_propose_btn tooltipa" puser="' . $user_id . '" user_id="' . $plrow->tfb_user_ref . '" row_id="' . $plrow->ID . '" user_type="' . $user_type_ref . '"><i class="fa fa-upload"></i> <span class="tooltipatext">Submit Proposal</span></a>&nbsp;
											<a class="send_message send_message_btn tooltipa" proj_id="' . $plrow->ID . '" send_user="' . $plrow->userID . '" send_user_type="' . $plrow->userType . '"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>&nbsp;
											<a class="remove_saved_project view_propose_btn tooltipa" data-toggle="confirmation" data-title="Are You want to do this?" proj_id="' . $plrow->ID . '" user_id="' . $user_id . '" style=""><i class="fa fa-trash"></i> <span class="tooltipatext">Remove</span></a>'); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        <?php }
        if ($user_type_ref == 3) { ?>

            <div class="sub_page_wraper">
                <section class="beneficiary_dashboard">
                    <div class="container">
                        <div class="common_dashboard_sec beneficiary_my_projects">
                            <div class="dsahboard_header_sec">
                                <div class="col-md-3">
                                    <h2>My Projects</h2>
                                </div>
                                <?php if ($user_type_ref == 1 || $user_type_ref == 2) {
                                } else { ?>
                                    <a class="dash_browse_btn" href="<?= base_url() ?>listing/create_project"> Create
                                        Projects</a>
                                <?php } ?>
                            </div>
                            <div class="dynamic_table">

                                <table id="projects_table" class="table table-striped table-bordered" width="100%"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="width:12%;">Project No</th>
                                        <th style="width:12%;">Project Title</th>
                                        <th style="width:12%;">Amount(USD)</th>
                                        <th class="text-center">Views</th>
                                        <th class="text-center">Featured</th>
                                        <th class="text-center" style="width:12%;">Timeline</th>
                                        <th class="text-center"style="width:14%;">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    if ($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0) {

                                        foreach ($projects_listed as $plrow) {

                                            ?>
                                            <tr>
                                                <td class="pro_no" style="width:11%;">
                                                    <a href="javascript:void(0)" puser="<?= $plrow->userID; ?>"
                                                       row_id="<?= $plrow->ID; ?>" <?= (($user_id <> 0) ? 'class="proj_info"' : '') ?>><?php echo 'TF-' . strtotime($plrow->postDate) ?></a>
                                                </td>
                                                <td class="col-md-3">
                                                    <?php

                                                    if (strlen($plrow->title) <= 30) {

                                                        echo ucfirst($plrow->title);

                                                    } else {
                                                        echo ucfirst(substr($plrow->title, 0, 30)) . '<a href="javascript:void(0)" puser="' . $plrow->userID . '" row_id="' . $plrow->ID . '" ' . (($user_id <> 0) ? "class='more_info'" : "") . '>.. more<div class="descrip">' . ucfirst($plrow->title) . '</div></a>';
                                                    }

                                                    ?>

                                                </td>
                                                <td class="time_line_bar text-center">
                                                    <div class="td_timeline"><?= (($plrow->fixedBudget <> '' && $plrow->fixedBudget <> 0) ? '(T) - ' . $plrow->fixedBudget : '') . '<hr/>' . (($plrow->financing_amount <> '' && $plrow->financing_amount <> 0) ? '(F) - ' . $plrow->financing_amount : ''); ?></div>
                                                </td>
                                                <td class="text-center">
                                                    00
                                                </td>
                                                <td class="text-center feat">
                                                    <?= ($plrow->featured ? '<span class="label label-featured"><i class="fa fa-check"></i></span>' : '<span class="label label-not-featured"><i class="fa fa-times"></i></span>'); ?>
                                                </td class="text-center">
                                                <td class="time_line_bar">
                                                    <div class="td_timeline"><?= '(P) - ' . date('d M, Y', strtotime($plrow->updatingDate)) . '<hr/>(C) - ' . date('d M, Y', strtotime($plrow->closingDate)); ?></div>
                                                </td>
                                                <td class="text-center status_bar">
                                                    <?php

                                                    $close_date = strtotime($plrow->closingDate);
                                                    $curr_date = strtotime(date('Y-m-d H:i:s'));

                                                    $tpfawardStatus = 0;
                                                    $tpfacceptStatus = 0;

                                                    if (!empty($proposal_details_financier[$plrow->ID])) {
                                                        $tpfawardStatus = $proposal_details_financier[$plrow->ID][0]->tpf_awardStatus;
                                                        $tpfacceptStatus = $proposal_details_financier[$plrow->ID][0]->tpf_beneficiary_accept;
                                                    }

                                                    if ($plrow->isDraft == 1) {

                                                        echo '<div class="statusd label pclose pdraft positionauto">DRAFT</div>';

                                                    } else if ($plrow->admin_approval == 0) {

                                                        echo '<div class="statusd pawaited pclose label positionauto">ADMIN APPROVAL AWAITED</div>';

                                                    } else if ($plrow->admin_approval == 2) {

                                                        echo '<div class="statusd pclose label positionauto rejected_by_admin">ADMIN REJECTED <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="descrip">' . ucfirst($plrow->rejection_reason) . '</div></a></div>';

                                                    } else if ($plrow->awardStatus == 2 && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd pcomplete pcompleted label positionauto">COMPLETED</div>';

                                                    } else if (($user_type_ref == 1 || $user_type_ref == 3) && $plrow->provider_completion_request == 2 && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd pcomplete pcompleted label positionauto">TRADE COMPLETED</div>';


                                                    } else if (($user_type_ref == 2 || $user_type_ref == 3) && ($plrow->financier_completion_request == 2 || $tpfawardStatus == 3) && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd pcomplete pcompleted label positionauto">FINANCE COMPLETED</div>';

                                                    } else if ((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || (($user_type_ref == 1 || $user_type_ref == 2) && ($tpfawardStatus == 1 || $plrow->awarded_financier == 1)) && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd pawarded pinprogress label positionauto">IN-PROGRESS</div>';

                                                    } else if ((($user_type_ref == 1 && $plrow->provider_completion_request == 0 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2)) || ($user_type_ref == 2 && $plrow->financier_completion_request == 0 && $tpfacceptStatus == 1 && $plrow->awarded_financier == 1) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd psfawarded label positionauto">AWARDED</div>';

                                                    } else if ($user_type_ref == 3 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd psfawarded label positionauto">SUPPLIER AWARDED</div>';

                                                    } else if ($user_type_ref == 3 && $plrow->awarded_financier == 1 && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd psfawarded label positionauto">FINANCIER AWARDED</div>';

                                                    } else if ($curr_date > $close_date) {

                                                        echo '<div class="statusd pclose pexpiry label positionauto">EXPIRED</div>';

                                                    } else if ($plrow->awardStatus == 0 && $plrow->row_deleted == 0) {

                                                        echo '<div class="statusd popen label positionauto">OPEN</div>';

                                                    } else {

                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        <?php } ?>
        <div class="container">
        <?php
        if ($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0) {

            foreach ($projects_listed as $plrow) {

                ?>
                <!--  Supplier Interested Popup -->
                <div class="modal fade" id="myModalP<?php echo $plrow->ID ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title"><strong>Supplier Interested</strong></h3>
                            </div>
                            <div class="modal-body">

                                <table class="display table dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Company</th>
                                        <th>Rating</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (isset($provider_interested_user[$plrow->ID]) && !empty($provider_interested_user[$plrow->ID]) && sizeof($provider_interested_user[$plrow->ID]) <> 0) {

                                        $count = 1;

                                        foreach ($provider_interested_user[$plrow->ID] as $purow) {

                                            echo '<tr><td>' . $count++ . '</td>';
                                            echo '<td>' . $purow['company'] . '</td>';
                                            echo '<td>' . $purow['rating'] . '</td>';
                                            echo '<td>' . $purow['country'] . '</td>';
                                            echo '<td>' . ((isset($purow['benif_accept']) && $purow['benif_accept'] == 2) ? '<span class="btn btn-danger"><i class="fa fa-times"></i>Rejected</span>' : '<a class="view_propose view_propose_btn tooltipa" user_type_ref="1" user_id="' . $purow['uid'] . '" row_id="' . $plrow->ID . '" prow_id="' . $purow['proposal_id'] . '"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn btn-danger send_message send_message_btn tooltipa" proj_id="' . $plrow->ID . '" user_id="' . $purow['uid'] . '" send_user="' . $purow['uid'] . '" send_user_type="1"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>') . ' ' . ((isset($purow['benif_accept']) && $purow['benif_accept'] == 1 && $plrow->awarded_provider == 2) ? '<div id="providr-' . $plrow->ID . '" class="star provider_rating" data-rating="' . $purow['benif_rating'] . '" from_user_id="' . $user_id . '" from_user_type="' . $user_type_ref . '" to_user_id="' . $purow['uid'] . '" to_user_type="1" prow_id="' . $plrow->ID . '" data-toggle="confirmation" data-title="Are You want to do this?"></div>' : '') . '</td></tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5"><center>No User found</center></td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financier Interested Popup -->
                <div class="modal fade" id="myModalF<?php echo $plrow->ID ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title"><strong>Financier Interested</strong></h3>
                            </div>
                            <div class="modal-body">

                                <table class="display table dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Company</th>
                                        <th>Rating</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (isset($financier_interested_user[$plrow->ID]) && !empty($financier_interested_user[$plrow->ID]) && sizeof($financier_interested_user[$plrow->ID]) <> 0) {

                                        $count = 1;

                                        foreach ($financier_interested_user[$plrow->ID] as $furow) {

                                            echo '<tr><td>' . $count++ . '</td>';
                                            echo '<td>' . $furow['company'] . '</td>';
                                            echo '<td>' . $furow['rating'] . '</td>';
                                            echo '<td>' . $furow['country'] . '</td>';
                                            echo '<td>' . ((isset($furow['benif_accept']) && $furow['benif_accept'] == 2) ? '<span class="btn btn-danger"><i class="fa fa-times"></i>Rejected</span>' : '<a class="view_propose view_propose_btn tooltipa" user_type_ref="2" user_id="' . $furow['uid'] . '" row_id="' . $plrow->ID . '" prow_id="' . $furow['proposal_id'] . '"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn btn-danger send_message send_message_btn tooltipa" proj_id="' . $plrow->ID . '" user_id="' . $furow['uid'] . '" send_user="' . $furow['uid'] . '" send_user_type="2"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>') . ' ' . ((isset($furow['benif_accept']) && $furow['benif_accept'] == 1 && $plrow->awarded_financier == 2) ? '<div id="financr-' . $plrow->ID . '" class="star financier_rating" data-rating="' . $furow['benif_rating'] . '" from_user_id="' . $user_id . '" from_user_type="' . $user_type_ref . '" to_user_id="' . $furow['uid'] . '" to_user_type="2" prow_id="' . $plrow->ID . '" data-toggle="confirmation" data-title="Are You want to do this?"></div>' : '') . '</td></tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5"><center>No User found</center></td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
            }
        }
    } ?>
</div>
