#memoフォルダに日付.txtファイルを作成する
cd C:\Users\pms\Dropbox\dat\memo

echo _%date:~0,4%_%date:~5,2%_%date:~8,2%
type nul > "memo_%date:~0,4%_%date:~5,2%_%date:~8,2%".txt
