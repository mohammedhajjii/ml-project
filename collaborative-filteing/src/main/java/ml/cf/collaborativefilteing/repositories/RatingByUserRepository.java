package ml.cf.collaborativefilteing.repositories;

import ml.cf.collaborativefilteing.models.RatingByUser;
import org.springframework.data.cassandra.repository.CassandraRepository;

public interface RatingByUserRepository extends CassandraRepository<RatingByUser, Integer> {
}
