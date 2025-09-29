<?php
// === PHP logic giữ nguyên ===
// 1. Class BankAccount
class BankAccount {
    private $accountNumber;
    private $name;
    private $balance;

    public function __construct($accountNumber, $name, $balance=0){
        $this->accountNumber = $accountNumber;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit($amount){
        if ($amount > 0) $this->balance += $amount;
    }

    public function withdraw($amount){
        if ($amount > 0 && $amount <= $this->balance){
            $this->balance -= $amount;
        } else {
            echo "Không đủ tiền trong tài khoản.<br>";
        }
    }

    public function getAccountNumber(){ return $this->accountNumber; }
    public function getName(){ return $this->name; }
    public function getBalance(){ return $this->balance; }
}

// 2. Start session
session_start();
if (!isset($_SESSION['accounts'])) $_SESSION['accounts'] = [];

$message = "";

// 3. Thêm tài khoản
if (isset($_POST['add_account'])) {
    $accNo = $_POST['accountNumber'];
    $name  = $_POST['name'];
    $balance = $_POST['balance'];

    $exists = false;
    foreach ($_SESSION['accounts'] as $account) {
        if ($account instanceof BankAccount && $account->getAccountNumber() == $accNo) {
            $exists = true;
            break;
        }
    }

    if ($exists) {
        $message = "Số tài khoản $accNo đã tồn tại.";
    } else {
        $account = new BankAccount($accNo, $name, $balance);
        $_SESSION['accounts'][] = $account;
        $message = "Thêm tài khoản $accNo thành công.";
    }
}

// 4. Nạp tiền
if (isset($_POST['deposit'])) {
    $accNo  = $_POST['accNo'];
    $amount = $_POST['amount'];

    $found = false;
    foreach ($_SESSION['accounts'] as $account) {
        if ($account instanceof BankAccount && $account->getAccountNumber() == $accNo) {
            $account->deposit($amount);
            $found = true;
            $message = "Nạp $amount vào tài khoản $accNo thành công.";
            break;
        }
    }

    if (!$found) $message = "Không tìm thấy tài khoản với số: $accNo";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tài khoản ngân hàng</title>
    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">

    <h1 class="mb-4 text-center">Quản lý tài khoản ngân hàng</h1>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>

    <div class="row">
        <!-- Thêm tài khoản -->
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    Thêm tài khoản
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label>Số tài khoản:</label>
                            <input type="text" name="accountNumber" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tên chủ tài khoản:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Số dư ban đầu:</label>
                            <input type="number" name="balance" class="form-control" value="0" min="0">
                        </div>
                        <button type="submit" name="add_account" class="btn btn-success w-100">Thêm tài khoản</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nạp tiền -->
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-warning text-dark">
                    Nạp tiền
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label>Số tài khoản:</label>
                            <input type="text" name="accNo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Số tiền nạp:</label>
                            <input type="number" name="amount" class="form-control" min="1" required>
                        </div>
                        <button type="submit" name="deposit" class="btn btn-primary w-100">Nạp tiền</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách tài khoản -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">Danh sách tài khoản</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Số tài khoản</th>
                        <th>Tên chủ tài khoản</th>
                        <th>Số dư</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['accounts'] as $account): ?>
                    <?php if ($account instanceof BankAccount): ?>
                        <tr>
                            <td><?= $account->getAccountNumber() ?></td>
                            <td><?= $account->getName() ?></td>
                            <td><?= number_format($account->getBalance(), 0, ',', '.') ?> đ</td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS (nếu cần) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
