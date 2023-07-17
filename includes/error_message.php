<?php
$alertMessages = [
    "success" => $_SESSION["success_messages"] ?? [],
    "error" => $_SESSION["error_messages"] ?? [],
    "info" => $_SESSION["info_messages"] ?? [],
    "warning" => $_SESSION["warning_messages"] ?? []
];
?>

<?php foreach ($alertMessages as $type => $messages): ?>
    <?php if (!empty($messages)): ?>
        <div class="col-md-12">
            <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h4><?php echo ucfirst($type); ?></h4>
                <ul>
                    <?php foreach ($messages as $message): ?>
                        <li><?php echo $message; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php unset($_SESSION[$type . "_messages"]); ?>
    <?php endif; ?>
<?php endforeach; ?>