:root{--green-dark:#064e3b;--green:#0f7a4f;--light:#e8f8ef;--bg:#f7faf8;--border:#dbe7df;--red:#dc2626;--orange:#f59e0b;--blue:#2563eb;--purple:#7c3aed;--gray:#64748b}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial,Helvetica,sans-serif;background:var(--bg);color:#17211b}
.auth-page{min-height:100vh;display:grid;place-items:center;background:linear-gradient(135deg,#064e3b,#0f7a4f)}
.auth-card{width:430px;background:white;border-radius:18px;padding:35px;box-shadow:0 20px 60px #0004}
.auth-card h1{color:var(--green-dark);margin-bottom:8px}.auth-card p{color:#5f6f67;margin-bottom:18px}
input,select{width:100%;padding:13px;margin-bottom:14px;border:1px solid var(--border);border-radius:10px}
button,.btn{border:none;padding:11px 13px;border-radius:10px;background:var(--green);color:white;font-weight:bold;cursor:pointer;text-decoration:none;display:inline-block;margin:2px}
.btn-danger{background:#fee2e2;color:var(--red)}.btn-light{background:var(--light);color:var(--green-dark)}.btn-blue{background:var(--blue)}
.layout{display:flex;min-height:100vh}.sidebar{width:275px;background:var(--green-dark);color:white;padding:25px 18px;position:fixed;top:0;bottom:0;overflow:auto}
.brand{display:flex;gap:12px;align-items:center;margin-bottom:20px}.logo-icon{background:#ffffff25;padding:12px;border-radius:14px}.brand h2{font-size:21px}.brand p{font-size:12px;opacity:.8}
.userbox{background:#ffffff18;border-radius:14px;padding:13px;margin-bottom:20px}.userbox small{display:block;opacity:.8;margin-top:3px}
.sidebar nav a{display:block;color:white;padding:12px 14px;margin-bottom:7px;border-radius:12px;text-decoration:none;font-weight:bold}.sidebar nav a:hover{background:#ffffff22}
.main{margin-left:275px;padding:35px;width:calc(100% - 275px)}.page-title{margin-bottom:20px}.page-title h1{font-size:30px}.page-title p{color:#5f6f67}
.grid{display:grid;gap:18px}.grid-4{grid-template-columns:repeat(4,1fr)}.grid-3{grid-template-columns:repeat(3,1fr)}.grid-2{grid-template-columns:repeat(2,1fr)}
.card{background:white;border:1px solid var(--border);border-radius:16px;padding:22px;box-shadow:0 5px 18px #0000000a}.stat h3{color:#5f6f67;font-size:14px;margin-bottom:8px}.stat strong{font-size:29px;display:block}.stat p{color:#5f6f67;font-size:13px;margin-top:6px}
.table-wrap{overflow-x:auto}table{width:100%;border-collapse:collapse;background:white;border-radius:14px;overflow:hidden}th,td{padding:13px;border-bottom:1px solid var(--border);text-align:left}th{background:var(--green-dark);color:white}
.badge{padding:6px 10px;border-radius:20px;font-weight:bold;font-size:12px}.high{background:#fee2e2;color:var(--red)}.medium{background:#fef3c7;color:var(--orange)}.low{background:#dcfce7;color:var(--green)}
.alert-card{border-left:5px solid var(--red);background:#fff7f7;margin-bottom:14px}
.chart-box{height:280px;display:flex;align-items:end;gap:12px;border-left:2px solid #94a3b8;border-bottom:2px solid #94a3b8;padding:15px;background:#fbfdfc;border-radius:12px}
.bar{flex:1;background:var(--green);border-radius:8px 8px 0 0;min-height:24px;color:white;text-align:center;font-size:12px;padding-top:8px}
.mini-chart{display:flex;gap:8px;align-items:end;height:180px;padding:10px;background:#f8fafc;border-radius:12px}
.mini-bar{flex:1;border-radius:7px 7px 0 0;text-align:center;color:white;font-size:11px;padding-top:6px;min-height:18px}
.form-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:15px}.form-grid button{grid-column:span 2}.note{background:#ecfdf5;border-left:5px solid var(--green);padding:15px;border-radius:12px;margin-bottom:18px}
.report-actions{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px}.print-only{display:none}
@media print{.sidebar,.report-actions,.no-print{display:none!important}.main{margin-left:0;width:100%;padding:10px}.card{box-shadow:none;break-inside:avoid}.print-only{display:block}.page-title{border-bottom:2px solid #064e3b;padding-bottom:10px}}
@media(max-width:900px){.sidebar{position:static;width:100%}.layout{display:block}.main{margin-left:0;width:100%;padding:18px}.grid-4,.grid-3,.grid-2,.form-grid{grid-template-columns:1fr}.form-grid button{grid-column:span 1}}