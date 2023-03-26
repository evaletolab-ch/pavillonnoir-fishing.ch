# open cli

# rename collection
php cp collection/rename --name Agenda --to agendas

# Remove locks older than 6h (21600s)
$ php cp reset-expiredlocks --time 21600