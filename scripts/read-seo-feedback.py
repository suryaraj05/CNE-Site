from openpyxl import load_workbook

path = r"c:\Users\ssury\Downloads\SEO Feedback on New UI.xlsx"
wb = load_workbook(path, data_only=True)
print("sheets:", wb.sheetnames)
for name in wb.sheetnames:
    ws = wb[name]
    print("===", name, "rows", ws.max_row, "cols", ws.max_column)
    for i, row in enumerate(ws.iter_rows(values_only=True), 1):
        vals = [("" if c is None else str(c).replace("\n", " / ")) for c in row]
        if any(v.strip() for v in vals):
            print(f"{i}| " + " || ".join(vals))
