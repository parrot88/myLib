#タイムスタンプをクリップボードにコピーするバッチ
echo _%date:~0,4%_%date:~5,2%_%date:~8,2%
SET /P<NUL="%date:~0,4%%date:~5,2%%date:~8,2%%time:~0,2%%time:~3,2%%time:~6,2%"|clip
rem SET /P<NUL="%date:~0,4%%date:~5,2%%date:~8,2%"|clip
rem pause