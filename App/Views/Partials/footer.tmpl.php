<footer>
    <p>Ceci est un footer</p>
</footer>


$stocke = "
SELECT * FROM event e
INNER JOIN event_content 		AS ec 		ON ec.event_id = e.id
INNER JOIN content 				AS c 		ON c.id = ec.content_id
INNER JOIN event_media			AS em		ON em.event_id = e.id
INNER JOIN media				AS m		ON m.id = em.media_id
INNER JOIN media_media_type		AS mmt		ON mmt.media_id = m.id
INNER JOIN media_type			AS mt 		ON mt.id = mmt.media_type_id

WHERE start_date < NOW() AND end_date > NOW() AND importance = 'BIG' ORDER BY e.start_date DESC
";