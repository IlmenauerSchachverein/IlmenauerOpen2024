# Konvertiert alle .doc und .docx Dateien im aktuellen Ordner in .pdf Dateien
# Erfordert 'libreoffice' für die Konvertierung

for file in *.doc *.docx; do
  if [ -f "$file" ]; then
    libreoffice --headless --convert-to pdf "$file"
  fi
done

