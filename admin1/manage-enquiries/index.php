<div class="mb-4">
    <!-- tables -->
    <?php require "./includes/config.php"; ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Manage Enquiries
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Ticket id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject </th>
                        <th>Description </th>
                        <th>Posting date </th>
                        <th>Action </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * from tblenquiry";
                    $temp = mysqli_query($conn, $sql);
                    $row = $temp->fetch_assoc();

                    if ($row > 0) {
                        foreach ($temp as $result) { ?>
                            <tr>
                                <td>#TCKT-<?php echo htmlentities($result['id']); ?></td>
                                <td><?php echo htmlentities($result['FullName']); ?></td>
                                <td>
                                    <?php echo $result['EmailId']; ?></td>


                                <td><?php echo htmlentities($result['Subject']); ?></a></td>
                                <td><?php echo htmlentities($result['Description']); ?></td>

                                <td><?php echo htmlentities($result['PostingDate']); ?></td>
                                <?php if ($result['Status'] == 1) {
                                ?><td>Read</td>
                                <?php } else { ?>

                                    <td><a href="manage-enquires.php?eid=<?php echo htmlentities($result['id']); ?>" onclick="return confirm('Do you really want to read')">Pending</a>
                                    </td>
                                <?php } ?>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>