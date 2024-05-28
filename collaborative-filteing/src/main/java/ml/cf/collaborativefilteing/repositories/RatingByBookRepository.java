package ml.cf.collaborativefilteing.repositories;

import ml.cf.collaborativefilteing.models.RatingByBook;
import org.springframework.data.cassandra.repository.CassandraRepository;

public interface RatingByBookRepository extends CassandraRepository<RatingByBook, Integer> {
}
