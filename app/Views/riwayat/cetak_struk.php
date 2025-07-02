<!DOCTYPE html>
<html>
<head>
  <title>Struk Transaksi</title>
  <style>
    body {
      font-family: monospace;
      font-size: 14px;
    }
    .struk {
      width: 300px;
      margin: auto;
      border: 1px dashed #000;
      padding: 10px;
    }
    .center {
      text-align: center;
    }
    table {
      width: 100%;
    }
    td {
      padding: 2px 0;
    }
    @media print {
      button {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="struk">
    <div class="center">
      <strong>WARQ</strong><br>
      -----------------------------<br>
      <small><?= $transaksi['tanggal'] ?></small>
    </div>
    <br>
    <table>
      <?php foreach ($detail as $d): ?>
        <tr>
          <td><?= $d['nama_produk'] ?></td>
          <td>x<?= $d['jumlah'] ?></td>
          <td style="text-align: right;">Rp<?= number_format($d['sub_total']) ?></td>
        </tr>
      <?php endforeach ?>
    </table>
    <hr>
    <table>
      <tr>
        <td>Total</td>
        <td style="text-align: right;">Rp<?= number_format($transaksi['total_harga']) ?></td>
      </tr>
      <tr>
        <td>Bayar</td>
        <td style="text-align: right;">Rp<?= number_format($transaksi['bayar']) ?></td>
      </tr>
      <tr>
        <td>Kembalian</td>
        <td style="text-align: right;">Rp<?= number_format($kembalian) ?></td>
      </tr>
    </table>
    <hr>
    <div class="center">
      ~ Terima Kasih ~
    </div>
  </div>

  <div class="center mt-3">
    <button onclick="window.print()">🖨️ Cetak</button>
  </div>
</body>
</html>
