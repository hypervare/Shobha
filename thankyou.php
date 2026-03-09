<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SOBHA 63A</title>
  <link rel="stylesheet" href="index.css"/>
  <!-- Bootstrap -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
    }
    .thankyou-box{
        font-size: 13px;
    }
    .thankyou-box a{
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        margin-top: 20px;
    }
    .thankyou-box a button{
        background-color: black;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    /* ===== OUTER TRANSLUCENT BOX ===== */
    .outer{
    width:100%;
    max-width:800px;
    padding:28px;
    background:rgba(255,255,255,0.45);
    backdrop-filter: blur(14px);
    border-radius:30px;
    box-shadow:0 40px 80px rgba(0,0,0,0.08);
    }

    /* ===== INNER CONTENT ===== */
    .inner{
    background:#ffffff;
    border-radius:24px;
    padding:38px 42px 34px;
    }

    /* ===== TOP ICON ===== */
    .top-icon{
    width:96px;
    height:96px;
    margin:0 auto 26px;
    border-radius:28px;
    background:
        linear-gradient(135deg,#020617,#1e293b);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:
        0 20px 40px rgba(0,0,0,0.25),
        inset 0 0 0 1px rgba(255,255,255,0.15);
    }

    .top-icon span{
    width:42px;
    height:42px;
    border-radius:50%;
    background:rgba(255,255,255,0.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    font-weight:700;
    color:#ffffff;
    backdrop-filter: blur(6px);
    }

    /* ===== THANK YOU NOTE ===== */
    .thank-note{
    background:#f1f5f9;
    border-radius:16px;
    padding:18px 22px;
    margin-bottom:34px;
    text-align:center;
    }

    .thank-note h1{
    font-size:22px;
    color:#020617;
    margin-bottom:6px;
    }

    .thank-note p{
    font-size:14px;
    color:#475569;
    }

    /* ===== STATUS LINE ===== */
    .progress-line{
    position:relative;
    height:4px;
    background:#e5e7eb;
    border-radius:4px;
    margin:28px 0 14px;
    }

    .progress-fill{
    position:absolute;
    height:100%;
    width:0%;
    background:#020617;
    border-radius:4px;
    transition:width .6s ease;
    }

    .dots{
    position:absolute;
    top:50%;
    left:0;
    width:100%;
    display:flex;
    justify-content:space-between;
    transform:translateY(-50%);
    }

    .dot{
    width:20px;
    height:20px;
    border-radius:50%;
    background:#e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    font-weight:600;
    color:#ffffff;
    transition:.3s ease;
    }

    .dot.active{
    background:#020617;
    }

    .dot.done::after{
    content:"✓";
    }

    /* ===== LABELS (FIXED ALIGNMENT) ===== */
    .labels{
    display:flex;
    justify-content:space-between;
    margin-top:6px;
    }

    .labels span{
    width:33%;
    text-align:center;
    font-size:13px;
    color:#94a3b8;
    line-height:1.2;
    }

    .labels span.active{
    color:#020617;
    font-weight:600;
    }

    /* ===== ACTION BAR ===== */
    .action-bar{
    margin-top:36px;
    padding-top:22px;
    border-top:1px solid #e5e7eb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
    }

    .actions{
    display:flex;
    gap:12px;
    }

    .actions a{
    text-decoration:none;
    padding:12px 18px;
    border-radius:14px;
    font-size:14px;
    transition:.25s ease;
    }

    .back{
    background:#e5e7eb;
    color:#020617;
    }

    .back:hover{
    background:#d1d5db;
    }

    .contact{
    background:#020617;
    color:#ffffff;
    }

    .contact:hover{
    background:#000000;
    }

    .emergency{
    font-size:13px;
    color:#475569;
    }

    .emergency strong{
    color:#020617;
    }

    /* ===== MOBILE ===== */
    @media(max-width:640px){
    .inner{
        padding:28px 24px 30px;
    }
    .action-bar{
        flex-direction:column;
        align-items:flex-start;
    }
    }

  </style>
</head>
<body>

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    $mailTO = "tusharkashyap06@gmail.com";
    $sub = "SOBHA 63A - Enquiry";
    $fullname = $_POST['fullname'];
    $email = $_POST['mail'];
    $phone = $_POST['phone'];
    $bdy = "Name: $fullname"."<br>"."Email: $email"."<br>"."Phone: $phone";

    $leadData = [
        'name' => $fullname,
        'phone' => $phone,
        'email' => $email,
        'projectName' => $_POST['projectName'],
        'projectId' => $_POST['projectId'],
        "utm_source" => $_POST['utm_source'],
        "utm_medium" => $_POST['utm_medium'],
        "utm_campaign" => $_POST['utm_campaign'],
        "utm_keyword" => $_POST['utm_keyword'],
        "utm_creative" => $_POST['utm_creative'],
        "utm_content" => $_POST['utm_content'],
        "utm_term" => $_POST['utm_term'],
        "utm_campaign_id" => $_POST['utm_campaign_id'],
        "utm_adgroup" => $_POST['utm_adgroup'],
    ];

    // echo json_encode($leadData); // For debugging purposes, you can log the lead data to ensure it's being captured correctly before sending it to the API.

    $ch = curl_init('https://app.aiprospark.com/api/v1/leads/website');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($leadData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-API-Key: AK_U5RitgN86kqwQeGnnYD2yfjeG0sl',
        'X-Partner: Website'
    ]);
    
    try {
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        
        // echo $response; // For debugging purposes, you can log the response to see the API's feedback.

        if ($result['success']) {

            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'noreply.admerit@gmail.com';                 // SMTP username (your Gmail address)
            $mail->Password   = 'wgrukbgnulfkfevp';                    // SMTP password (the generated App Password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 'PHPMailer::ENCRYPTION_SMTPS' also accepted on port 465
            $mail->Port       = 587;                                    // TCP port to connect to; use 465 for SSL

            // Recipients
            $mail->setFrom('noreply.admerit@gmail.com', 'SOBHA 63A Enquiry');         // Sender email and name
            $mail->addAddress($mailTO, 'WD Vilasati');     // Add a recipient
            

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = $sub;
            $mail->Body    = $bdy;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Plain text body for non-HTML clients

            $mail->send();
            echo '<div class="outer">
                    <div class="inner">

                        <!-- UNIQUE TOP ICON -->
                        <div class="top-icon">
                        <span>✓</span>
                        </div>

                        <!-- THANK YOU NOTE -->
                        <div class="thank-note">
                        <h1>Thank You!</h1>
                        <p>Your message is safely received. Here’s what happens next.</p>
                        <br>
                        <hr>
                        <br>
                        <div class="thankyou-box" style="text-align: left;">
                        <h3>A dedicated project advisor will connect with you in 5 Minutes to provide:</h3>
                        <ul style="margin-left: 20px; margin-top: 5px;">
                            <li>Unit-wise pricing</li>
                            <li>Floor comparison</li>
                            <li>Payment structure</li>
                            <li>Availability status</li>
                        </ul>
                        </div>
                        </div>

                        <!-- STATUS LINE -->
                        <div class="progress-line">
                        <div class="progress-fill" id="fill"></div>

                        <div class="dots">
                            <div class="dot" id="dot1"></div>
                            <div class="dot" id="dot2"></div>
                            <div class="dot" id="dot3"></div>
                        </div>
                        </div>

                        <!-- LABELS -->
                        <div class="labels">
                        <span id="label1">Sent</span>
                        <span id="label2">Received</span>
                        <span id="label3">Responding</span>
                        </div>

                        <!-- ACTION BAR -->
                        <div class="action-bar">
                        <div class="actions">
                            <a href="/" class="back">Go Back</a>
                            <a href="https://wa.me/918755334299?text=Hi%2C%20I%20am%20interested%20in%20Sobha%20New%20Launch%20Project%20in%20Sector%2063A%2C%20Please%20Provide%20me%20more%20Details" class="contact">WhatsApp Us</a>
                        </div>

                        <div class="emergency">
                            Emergency? Call <strong>+91 87553 34299</strong>
                        </div>
                        </div>

                    </div>
                    </div>

                    <script>
                    const steps = [
                    { dot: "dot1", label: "label1", width: "0%" },
                    { dot: "dot2", label: "label2", width: "50%" },
                    { dot: "dot3", label: "label3", width: "100%" }
                    ];

                    let current = 0;

                    const timer = setInterval(() => {
                    if(current < steps.length){
                        const s = steps[current];
                        document.getElementById(s.dot).classList.add("active","done");
                        document.getElementById(s.label).classList.add("active");
                        document.getElementById("fill").style.width = s.width;
                        current++;
                    } else {
                        clearInterval(timer);
                    }
                    }, 1200);
                    </script>';
        } else {

            echo '<div class="thankyou-overlay" id="thankYouPopup">
            <div class="thankyou-box">
                <h2>Something went wrong!</h2>
                <a href="/"><button id="thankYouClose">BACK</button></a>
            </div>
            </div>';

        }
    } catch (Exception $e) {

        echo '<div class="thankyou-overlay" id="thankYouPopup">
            <div class="thankyou-box">
                <h2>Something went wrong!</h2>
                <a href="/"><button id="thankYouClose">BACK</button></a>
            </div>
            </div>';
            
    }
?>
</body>
</html>