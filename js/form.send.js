document.getElementById('myForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch('./includes/phpmailer/mailer.php', {
        method: 'POST',
        body: formData
    });
    const data = await response.json();
    if (data.status === 'success') {
        window.location.href = './thanks.html';
    } else {
        alert('メール送信に失敗しました。');
    }
});