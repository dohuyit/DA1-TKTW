<?php
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Thêm file
function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload .  time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}
// Xóa file 
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    // var_dump($file);
    // die;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// Xóa session sau khi load trang
function deleteSessionErrors()
{
    if (isset($_SESSION['flash'])) {
        // Hủy session sau khi load trang
        unset($_SESSION['flash']);
        unset($_SESSION['errors']);
        unset($_SESSION['thongBao']);
        unset($_SESSION['old_data']);
        unset($_SESSION['successMk']);
        unset($_SESSION['successTt']);
        unset($_SESSION['successAnh']);
        unset($_SESSION['errorsKH']);
        unset($_SESSION['tong']);
        unset($_SESSION['layMk']);
        unset($_SESSION['dat_hang_thanh_cong']);
    }
}

//upload - update album anh
function uploadFileAlbum($file, $folderUpload, $key)
{
    $pathStorage = $folderUpload .  time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

// format date
function formatDate($date)
{
    echo $newDate = date("d-m-Y", strtotime($date));
}


function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) {
        require_once './views/auth/formLogin.php';
        exit();
    }
}

function formatPrice($price)
{
    return number_format($price, 0, '.', ',') . "đ";
}

function sendMail($to, $subject, $content)
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bekatstore205@gmail.com';
        $mail->Password   = 'zgie gtvr hsxx nuha
';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('bekatstore205@gmail.com', 'bekat');
        $mail->addAddress($to, "Hi");
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            )
        ));
        $mail->send();
        echo 'Gửi mail thành công!';
    } catch (Exception $e) {
        echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}
