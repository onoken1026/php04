<?php
require 'db_connect.php';  // データベース接続

// データベースからデータを取得
$sql = 'SELECT * FROM gs_bm_table ORDER BY id ASC';
$stmt = $pdo->query($sql);
$responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<html><head><meta charset="utf-8"><title>データ一覧</title>';
echo '<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 12px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }
        th {
            background-color: #f8f8f8;
            cursor: pointer;
        }
        .filter-select {
            width: 150px;
            margin-bottom: 20px;
        }
      </style>';
echo '</head><body>';

echo '<h1>データ一覧</h1>';
echo '<a href="?download=1">CSVファイルをダウンロード</a>';

echo '<table>';
echo '<tr>';
$headers = ['ID', '会社名', 'メールアドレス', '業種', '従業員数', '平均商品数', '検品方法', '課題', '興味', '期待するメリット', 'チェック項目', '予算', '導入意向', '不安点', '現在のソフトウェア', 'サポートの必要性', '重要視するポイント', '回答日時', '操作'];

foreach ($headers as $header) {
    echo '<th>' . htmlspecialchars($header) . '</th>';
}
echo '</tr>';

// データの表示
foreach ($responses as $response) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($response['id']) . '</td>';
    echo '<td>' . htmlspecialchars($response['company_name']) . '</td>';
    echo '<td>' . htmlspecialchars($response['email']) . '</td>';
    echo '<td>' . htmlspecialchars($response['industory']) . '</td>';
    echo '<td>' . htmlspecialchars($response['company_size']) . '</td>';
    echo '<td>' . htmlspecialchars($response['average_prpduts']) . '</td>';
    echo '<td>' . htmlspecialchars($response['inspection_method']) . '</td>';
    echo '<td>' . htmlspecialchars($response['current_challenges']) . '</td>';
    echo '<td>' . htmlspecialchars($response['interest']) . '</td>';
    echo '<td>' . htmlspecialchars($response['benefits']) . '</td>';
    echo '<td>' . htmlspecialchars($response['check_items']) . '</td>';
    echo '<td>' . htmlspecialchars($response['budget']) . '</td>';
    echo '<td>' . htmlspecialchars($response['adpption']) . '</td>';
    echo '<td>' . htmlspecialchars($response['concerns']) . '</td>';
    echo '<td>' . htmlspecialchars($response['current_software']) . '</td>';
    echo '<td>' . htmlspecialchars($response['support_needs']) . '</td>';
    echo '<td>' . htmlspecialchars($response['priority']) . '</td>';
    echo '<td>' . htmlspecialchars($response['created_at']) . '</td>';
    echo '<td><a href="edit.php?id=' . $response['id'] . '">編集</a> | <a href="delete.php?id=' . $response['id'] . '">削除</a></td>';
    echo '</tr>';
}

echo '</table>';
echo '</body></html>';
?>
