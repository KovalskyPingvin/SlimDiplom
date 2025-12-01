// public/js/admin/requests.js

function generateDoc(data) {
    const now = new Date();
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const year = now.getFullYear();
    const formattedDate = `${day}.${month}.${year}`;

    // === Используем `data.recipient`, который пришёл из шаблона ===
    const docContent = `
    <html xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:w="urn:schemas-microsoft-com:office:word"
    xmlns="http://www.w3.org/TR/REC-html40">
    <head>
      <meta charset="UTF-8">
      <!--[if gte mso 9]><xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml><![endif]-->
      <style>
          body { font-family: 'Times New Roman', serif; }
          .header-table { width: 100%; border-collapse: collapse; }
          .header-table td { font-family: 'Times New Roman', serif; vertical-align: top; padding: 0; }
          .header-left-column { width: 65%; }
          .header-right-column { width: 35%; text-align: left; line-height: 1; }
          .header-right-column p { margin-bottom: 0.4px; }
          .main-content { margin-bottom: 40px; font-family: 'Times New Roman', serif; }
          .presentation { text-align: center; font-weight: bold; }
          .indented-paragraph { text-indent: 30px; font-family: 'Times New Roman', serif; }
          .signature-block { margin-bottom: 20px; width: 100%; font-family: 'Times New Roman', serif; }
          .signature-item span { font-size: 0.5em; display: block; margin-bottom: 2px; }
          .signature-item hr { margin: 3px 0; border: none; border-bottom: 1px solid #000; }
      </style>
    </head>
    <body>
      <table class="header-table">
        <tr>
          <td class="header-left-column"></td>
          <td class="header-right-column">
            <p>Начальнику отдела СКСиС УИ</p>
            <p>${data.recipient}</p>  <!-- ← ВСТРОЕННОЕ ФИО ИЗ БАЗЫ -->
            <p>${data.department}</p>
            <p>${data.chief}</p>
            <p>Тел.: ${data.phone}</p>
          </td>
        </tr>
      </table>
      <div style="clear: both;"></div>

      <div class="main-content">
        <p class="presentation">Представление</p>
        <p style="margin-bottom: 0; text-indent: 30px">Прошу выполнить работу по замене картриджа к принтеру "${data.device}", инвентарный № ${data.inventory}, № корпуса ${data.building}, № кабинета ${data.room}.</p>
        <p class="indented-paragraph">В связи с тем, что ${data.reason}.</p>
      </div>

      <div class="date">
        <p>${formattedDate}</p>
        <br>
      </div>

      <div class="signature-block">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">Должность руководителя подразделения</span>
              </td>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">Подпись</span>
              </td>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">И.О. Фамилия</span>
              </td>
            </tr>
          </table>
      </div>

      <div class="signature-block">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">Должность материально-ответственного лица</span>
              </td>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">Подпись</span>
              </td>
              <td style="width: 30%; text-align: center; vertical-align: top;">
                  <hr style="border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px">
                  <span style="font-size: 0.5em; text-align:center">И.О. Фамилия</span>
              </td>
            </tr>
          </table>
      </div>
    </body>
    </html>
    `;

    const blob = new Blob(['\ufeff', docContent], { type: 'application/msword' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `Заявка_${data.device || 'устройство'}_${day}.${month}.${year}.doc`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}